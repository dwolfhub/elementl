<?php
/** @var \Elementl\ContentType\Entity $tableEntity */
require __DIR__ . '/../partials/header.php';
?>

    <h1><?= $tableEntity->getReadableName() ?></h1>

<?php require __DIR__ . '/../partials/footer.php'; ?>