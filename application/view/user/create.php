<?php
use Mini\Core\Functions;
$this->layout('layout');
$content = new Functions();
?>

<div class="contentTitles">
    <div class="titles">
        <h2>Login</h2>
    </div>
    <div class="paddin">

        <h2>You are in the View: application/view/login/index.php (everything in the box comes from this file)</h2>
        <p>In a real application this could be the login page.</p>
    </div>
</div>


<div class="contentTitles">
    <div class="titles">
        <h5>Formulario de login</h5>
    </div>
    <div class="paddin">
        <div class="container">
            <div align="center">
                <form class="" action="<?= URL."user/create"?>" method="post">
                    <?php
                    if(isset($errores)){
                        Functions::mostrarErrorCampo('first_name', $errores);
                        Functions::mostrarErrorCampo('last_name', $errores);
                        Functions::mostrarErrorCampo('email', $errores);
                        Functions::mostrarErrorCampo('pass', $errores);
                    }
                    ?>
                    <p>First name:</p>
                    <p><input type="text" name="first_name" <?= $content::mostrarCampo('first_name') ?>></p>
                    <p>Last name:</p>
                    <p><input type="text" name="last_name" <?= $content::mostrarCampo('last_name') ?>></p>
                    <p>Email:</p>
                    <p><input type="text" name="email" <?= $content::mostrarCampo('email') ?>></p>
                    <p>Password:</p>
                    <p><input type="password" name="pass1"></p>
                    <p>Confirm password:</p>
                    <p><input type="password" name="pass2"></p>
                    <p><input type="submit" name="submit" value="Submit"></p>
                </form>
            </div>
        </div>

    </div>
</div>
