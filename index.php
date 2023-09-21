<?php
require_once 'vendor/autoload.php';

if (!isset($argv[1])) {
    echo 'Usage: php index.php language' . PHP_EOL
        . 'Supported languages:' . PHP_EOL
        . 'en' . PHP_EOL
        . 'de' . PHP_EOL
        . 'es' . PHP_EOL
        . 'pl' . PHP_EOL;
}

(new Bottles\BottlesGenerator($argv[1]))->generate();
