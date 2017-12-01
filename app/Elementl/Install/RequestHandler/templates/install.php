<?php
/** @var Elementl\Helper\Dictionary $errors */
/** @var Elementl\Helper\Dictionary $data */
/** @var string $nonce */
?>
<!doctype html>
<html>
    <head>
        <title>Elementl Installer</title>
        <link rel="stylesheet" href="/Elementl/Install/static/install.css">
    </head>
    <body>
        <main>
            <h1>Elementl Installation</h1>

            <hr>

            <h2>Create user account</h2>

            <?php if ($errors->has('nonce')): ?>
                <p class="error">
                    <?= $errors->get('nonce'); ?>
                </p>
            <?php endif; ?>

            <form method="post">
                <input type="hidden" name="nonce" value="<?= $nonce ?>">

                <div class="fields">
                    <div class="field <?php if ($errors->has('username')): ?>error<?php endif; ?>">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="<?= $data->get('username', '') ?>" minlength="6" maxlength="255" required>
                        <p class="help-text">
                            <?php if ($errors->has('username')): ?>
                                <?= $errors->get('username'); ?>
                            <?php else: ?>
                                At least 6 characters. Letters and numbers only.
                            <?php endif; ?>
                        </p>
                    </div>

                    <div class="field full-length <?php if ($errors->has('email')): ?>error<?php endif; ?>">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" value="<?= $data->get('email', '') ?>" maxlength="255" required>
                        <p class="help-text">
                            <?= $errors->get('email'); ?>
                        </p>
                    </div>

                    <div class="field <?php if ($errors->has('password')): ?>error<?php endif; ?>">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" minlength="8" required>
                        <p class="help-text">
                            <?php if ($errors->has('password')): ?>
                                <?= $errors->get('password'); ?>
                            <?php else: ?>
                                At least 8 characters.
                            <?php endif; ?>
                        </p>
                    </div>

                    <div class="field <?php if ($errors->has('password_confirm')): ?>error<?php endif; ?>">
                        <label for="password_confirm">Confirm Password</label>
                        <input type="password" name="password_confirm" id="password_confirm" minlength="8" required>
                        <p class="help-text">
                            <?= $errors->get('password_confirm'); ?>
                        </p>
                    </div>
                </div>

                <button type="submit">Submit &rarr;</button>
            </form>
        </main>
    </body>
</html>