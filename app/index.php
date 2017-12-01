<?php

use Elementl\Application;
use Elementl\ContentType\Entity;
use Elementl\ContentType\Field\Checkbox;
use Elementl\ContentType\Field\Image;
use Elementl\ContentType\Field\Text;

require __DIR__ . '/autoload.php';

$app = new Application(require __DIR__ . '/config.php');

$posts = new Entity(
    'posts', [
        new Checkbox('is_published'),
        new Text('title'),
        new Text('body'),
        new Image('image'),
    ]
);

$app->bootstrap([$posts]);

$app->run();
