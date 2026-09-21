<?php

$cest = dirname(__DIR__) . '/codeception/Integration/VersionLoaderCest.php';
$contents = file_get_contents($cest);
if ($contents === false) {
    fwrite(STDERR, "Could not read {$cest}\n");
    exit(1);
}

$from = "class_exists('PublishPress\\Dompdf\\Dompdf', false)";
$to = "class_exists('PublishPress\\Dompdf\\Dompdf')";

// The generator adds sample historical versions used by its fixture setup.
// This lightweight suite registers only this package's real build.
$contents = preg_replace(
    "/^\s*'2\\.0\\.0\\.[12]'.*\R/m",
    '',
    $contents
);

if (strpos($contents, $from) === false) {
    file_put_contents($cest, $contents);
    exit(0);
}

file_put_contents($cest, str_replace($from, $to, $contents, $count));
if ($count < 1) {
    fwrite(STDERR, "Failed to patch class_exists assertion in {$cest}\n");
    exit(1);
}
