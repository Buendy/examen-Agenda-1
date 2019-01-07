<?php $this->layout('layout');
?>

<div class="contentTitles">
    <div class="titles">
        <?php if(isset($_SESSION['check'])) : ?>
            <form action="<?php echo URL; ?>home/index" method="post">
                <p><label for="search">Buscar por palabras: </label><input type="text" name="search"><input type="submit" value="Buscar" class="btnss"></p>
            </form>
        <?php endif ?>
    </div>
</div>

<div class="contentTitles">
    <div class="titles">
        <h2>Home EXAMEN 31</h2>
    </div>
    <div class="paddin">
        <h3>You are in the View: application/view/home/index.php (everything in the box comes from this file)</h3>
        <p>In a real application this could be the homepage.</p>
    </div>
</div>

<?php if(isset($_SESSION['userConSesionIniciada']['id'])) : ?>
    <div class="contentTitles">
        <div class="titles">
            <h2>Listado de contactos</h2>
        </div>
        <div class="paddin">

            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Categoría</th>
                </tr>
                <?php  foreach($data as $value): ?>
                    <tr>
                        <td><?= $value->first_name ?></td>

                        <td><?= $value->last_name ?></td>
                        <td><?= $value->email ?></td>
                        <td><?= $value->phone ?></td>
                        <td><?= $value->address ?></td>
                        <td><?= $value->name ?></td>
                    </tr>

                <?php endforeach ?>
            </table>

        </div>
    </div>

<?php endif ?>





