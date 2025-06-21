<?php
//  :¨·.·¨: 
//  `·.  Discord : Hasanx ★°*ﾟ
// Hasanxuk Cms★°*ﾟ Editado por Hasanx
?>

<?php require "includes/config.php"; ?>
<?php require "includes/header.php"; ?>
<?php require "includes/alerte.php"; ?>

<div class="container" style="margin-top:20px;">
  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading" id="bg-panel" style="border-radius:3px;">¡Ajustes de cuenta!</div>
        <div class="panel-body" id="body-panel">
          <div class="titre">Cambiar nombre de usuario</div>
          <form action="/settings/username" method="POST">
            <input type="text" name="nuevo_usuario" placeholder="Nuevo nombre de usuario" required>
            <button class="bouton-vert">Cambiar nombre de usuario</button>
          </form>
          <hr>
          <div class="titre">Cambiar contraseña</div>
          <form action="/settings/password" method="POST">
            <input type="password" name="nueva_password" placeholder="Nueva contraseña" required>
            <input type="password" name="confirmar_password" placeholder="Confirmar nueva contraseña" required>
            <button class="bouton-vert">Cambiar contraseña</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading" id="bg-panel">Información</div>
        <div class="panel-body" id="body-panel">
          <p>Desde aquí puedes cambiar tu nombre de usuario y contraseña de forma sencilla y segura.</p>
          <p>Recuerda mantener tus datos seguros y no compartas tu contraseña con nadie.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require "includes/footer.php"; ?>
</html>