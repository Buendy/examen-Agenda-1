<?php ?>
<div class="izquierda">
    <?php if(isset($_SESSION['userConSesionIniciada']['email'])): ?>
        <h4>Area de categorías</h4>
        <p><a href="<?= URL ?>category/index" class="btns">Ver categorías</a></p>
        <p><a href="<?= URL ?>category/create" class="btns">Crear categorías</a></p>
        <h4>Area de posts</h4>
        <p><a href="<?= URL ?>contact/index" class="btns">Ver Contactos</a></p>
        <p><a href="<?= URL ?>contact/create" class="btns">Crear Contacto</a></p>
    <?php endif; ?>
</div>