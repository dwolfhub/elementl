<?php /** @var \Elementl\ContentType\Entity[] $entities */ ?>
<!doctype html>
<html>
    <head>
        <title>Elementl</title>
        <link rel="stylesheet" href="/Elementl/Admin/static/admin.css">
    </head>
    <body>
        <header>
            <div class="container">
                <a href="/elmtl" class="logo">Dashboard</a>
                <nav>
                    <ul>
                        <?php foreach ($entities as $entity): ?>
                            <li>
                                <a href="/elmtl/entities/<?= $entity->getName(); ?>">
                                    <?= ucwords($entity->getReadableName()) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <li>
                            <a href="/elmtl/profile">Me</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="container">