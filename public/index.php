<?php

require __DIR__ . '/../vendor/autoload.php';

(Dotenv\Dotenv::createImmutable(__DIR__ . "/../."))->load();

require __DIR__ . '/../src/routes.php';