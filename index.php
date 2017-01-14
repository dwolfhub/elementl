<?php

// auto-loader
spl_autoload_register(function ($class_name) {
    require_once str_replace('\\', '/', $class_name . '.php');
});

$app = new Elementl\Application(require __DIR__ . '/config.php');
$app->bootstrap();

if ($app->isInstalled()) {
    $app->run();
} else {
    $app->install();
}