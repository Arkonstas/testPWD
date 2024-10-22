<?php

$composerPath = $_SERVER['DOCUMENT_ROOT'] . '/local/vendor/autoload.php';
$issetComposer = file_exists($composerPath);

if ($issetComposer)
    require_once $composerPath;