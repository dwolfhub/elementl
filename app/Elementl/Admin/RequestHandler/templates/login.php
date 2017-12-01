<?php
/** @var Elementl\Helper\Dictionary $errors */
/** @var Elementl\Helper\Dictionary $data */
/** @var string $nonce */
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="/Elementl/Install/static/install.css">
    </head>
    <body class="login-page">
        <main>
            <h1>Login</h1>
            <hr>
            <form method="post">
                <input type="hidden" name="nonce" value="<?= $nonce ?>">

                <div class="fields">
                    <div class="field <?php if ($errors->has('username')): ?>error<?php endif; ?>">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="<?= $data->get('username', '') ?>" minlength="6" maxlength="255" required>
                        <p class="help-text">
                            <?php if ($errors->has('username')): ?>
                                <?= $errors->get('username'); ?>
                            <?php endif; ?>
                        </p>
                    </div>

                    <div class="field <?php if ($errors->has('password')): ?>error<?php endif; ?>">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" minlength="8" required>
                        <p class="help-text">
                            <?php if ($errors->has('password')): ?>
                                <?= $errors->get('password'); ?>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>

                <button type="submit">Submit &rarr;</button>
            </form>
        </main>
    </body>
</html>