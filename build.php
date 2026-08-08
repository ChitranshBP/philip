<?php
/**
 * Build script for Netlify deployment
 * ------------------------------------------------------------------
 * Renders every PHP page to static HTML in dist/, rewrites .php links
 * to .html, and copies the assets alongside. Run locally with:
 *
 *     php build.php
 *
 * Netlify runs it via the build command in netlify.toml and publishes dist/.
 */

// Run from the project root no matter where the script was called from.
chdir(__DIR__);

// The CLI has no request, but the page templates read $_SERVER. Give them
// something sane so nothing warns mid-render.
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['REQUEST_URI']    = $_SERVER['REQUEST_URI']    ?? '/';
$_SERVER['HTTP_HOST']      = $_SERVER['HTTP_HOST']      ?? 'localhost';
$_SERVER['SERVER_NAME']    = $_SERVER['SERVER_NAME']    ?? 'localhost';
$_SERVER['HTTPS']          = 'on';

// Pages to build (source PHP file => output HTML file).
// Files that do not exist yet are skipped with a warning, so the pages we
// have planned can sit here until they are written.
$pages = [
    'index.php'        => 'index.html',
    'about.php'        => 'about.html',          // Philip's full story
    'medicare-101.php' => 'medicare-101.html',   // the long-form guide
    'contact.php'      => 'contact.html',
];

// Folders copied wholesale into dist/.
$assetDirs = ['assets'];

// Single files copied into dist/ when present.
$rootFiles = [
    'favicon.ico', 'favicon.png', 'robots.txt', 'sitemap.xml',
    '_redirects', '_headers',
];

/* ------------------------------------------------------------------ */

function removeDir(string $dir): void
{
    if (!is_dir($dir)) {
        return;
    }
    foreach (scandir($dir) as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }
        $path = "$dir/$file";
        is_dir($path) ? removeDir($path) : unlink($path);
    }
    rmdir($dir);
}

function copyDir(string $src, string $dst): int
{
    if (!is_dir($src)) {
        return 0;
    }
    if (!is_dir($dst)) {
        mkdir($dst, 0755, true);
    }
    $count = 0;
    foreach (scandir($src) as $file) {
        if ($file === '.' || $file === '..' || $file === '.DS_Store') {
            continue;
        }
        $srcPath = "$src/$file";
        $dstPath = "$dst/$file";
        if (is_dir($srcPath)) {
            $count += copyDir($srcPath, $dstPath);
        } elseif (copy($srcPath, $dstPath)) {
            $count++;
        }
    }
    return $count;
}

/* ---- Start from a clean dist/ ------------------------------------- */

removeDir('dist');
mkdir('dist', 0755, true);

/* ---- Render the pages --------------------------------------------- */

$built = 0;
$skipped = [];

foreach ($pages as $srcFile => $outFile) {

    if (!file_exists($srcFile)) {
        $skipped[] = $srcFile;
        echo "Skipped: $srcFile (not created yet)\n";
        continue;
    }

    $destPath = 'dist/' . $outFile;
    $destDir  = dirname($destPath);

    if (!is_dir($destDir)) {
        mkdir($destDir, 0755, true);
    }

    // Render. Included at global scope on purpose: the pages share
    // $SITE and the require_once'd includes across the whole build.
    ob_start();
    include $srcFile;
    $html = ob_get_clean();

    if (trim($html) === '') {
        fwrite(STDERR, "ERROR: $srcFile rendered nothing.\n");
        exit(1);
    }

    // Internal .php links become .html for the static host. Anything with a
    // scheme (tel:, mailto:, https://) has no .php in it, so it is untouched.
    $html = str_replace(
        ['.php"', ".php'", '.php#', '.php?'],
        ['.html"', ".html'", '.html#', '.html?'],
        $html
    );

    file_put_contents($destPath, $html);
    $built++;
    echo "Built:   $outFile (" . number_format(strlen($html) / 1024, 1) . " KB)\n";
}

/* ---- Copy the static files ---------------------------------------- */

foreach ($assetDirs as $dir) {
    $n = copyDir($dir, 'dist/' . $dir);
    echo "Copied:  $dir/ ($n files)\n";
}

foreach ($rootFiles as $file) {
    if (file_exists($file) && copy($file, 'dist/' . $file)) {
        echo "Copied:  $file\n";
    }
}

/* ---- Report -------------------------------------------------------- */

echo "\nBuild complete: $built page" . ($built === 1 ? '' : 's') . " in dist/.\n";

if ($skipped) {
    echo "Not built yet: " . implode(', ', $skipped) . "\n";
    echo "Links pointing at those pages will 404 until they exist —\n";
    echo "set learn_url / about_url to '' in inc/config.php to hide them.\n";
}
