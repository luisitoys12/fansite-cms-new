<?php
//  :¨·.·¨: 
//  `·.  Discord : Hasanx ★°*ﾟ
?>

<?php require "includes/config.php"; ?>
<?php require "includes/header.php"; ?>
<?php require "includes/alerte.php"; ?>

<div class="container" style="margin-top:20px;">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading" id="bg-panel" style="border-radius:3px;">¡Nuestro equipo!</div>
        <div class="panel-body" id="body-panel">
          <?php
          $secciones = [
            'Administración' => [8, 9, 10, 11, 12],
            'Administradores' => [5, 6, 7],
            'Redacción' => [3, 4]
          ];
          foreach ($secciones as $nombre => $grupos) {
            echo "<h3>$nombre</h3>";
            $usuarios = $db->query("SELECT * FROM users WHERE staff IN (" . implode(',', $grupos) . ") ORDER BY staff DESC, username ASC");
            if ($usuarios->rowCount() > 0) {
              echo '<div class="row">';
              while ($user = $usuarios->fetch()) {
                ?>
                <div class="col-sm-2 text-center" style="margin-bottom:20px;">
                  <img class="img-circle" src="https://www.habbo.com.tr/habbo-imaging/avatarimage?user=<?= $user['username'] ?>&action=std&direction=3&head_direction=3&gesture=sml&size=l" alt="<?= $user['username'] ?>" style="width:80px;height:80px;">
                  <div><strong><?= $user['username'] ?></strong></div>
                  <div>
                    <?php 
                    switch ($user['staff']) {
                      case 3: echo "Corrector"; break;
                      case 4: echo "Redactor"; break;
                      case 5: echo "Administrador"; break;
                      case 6: echo "Responsable Especial"; break;
                      case 7: echo "Jefe de Redacción"; break;
                      case 8: echo "Administrador"; break;
                      case 9: echo "Desarrollador"; break;
                      case 10: echo "Fundador"; break;
                      case 11: echo "Director"; break;
                      case 12: echo "Creador"; break;
                    }
                    ?>
                  </div>
                </div>
                <?php
              }
              echo '</div>';
            } else {
              echo '<div class="alert alert-info">No hay responsables en esta sección.</div>';
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require "includes/footer.php"; ?>
</html>