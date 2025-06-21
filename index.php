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
      <script type="text/javascript">
      $(function(){
        setInterval(function(){
          $(".slideshow ul").animate({marginLeft:-704},800,function(){
            $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
          })
        }, 3500);
      });
      </script>
      <div class="panel panel-default">
        <div class="panel-heading" id="bg-panel" style="border-radius:3px;">¡Vista general de noticias!</div>
      </div>
      <div class="row">
        <?php
          $noticias_recientes = $db->query("SELECT * FROM news WHERE validity = 1 ORDER BY post_at DESC LIMIT 0,3");
          while($noticia = $noticias_recientes->fetch()) {
            $autor_info = $db->prepare("SELECT * FROM users WHERE id = ?");
            $autor_info->execute(array($noticia['author']));
            $autor = $autor_info->fetch();
        ?>
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading" id="bg-nieuws" style="background-image:url('<?= $noticia['background']; ?>');">
              <div class="images-slider"><h2><?= $noticia['title']; ?></h2></div><br>
            </div>
            <div class="panel-body" id="body-panel" style="height:120px">
              <span class="label label-info"><?= $autor['username']; ?></span>
              <span class="label label-danger"><?= getDateComplete($noticia['post_at']); ?></span><br><br><?= $noticia['descr']; ?>
            </div>
            <div class="panel-footer">
              <a href="/article/<?= $noticia['id']; ?>"><button type="button" class="btn btn-default" data-dismiss="modal" style="font-size:12px;">Ver más</button></a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading" id="bg-panel">¡Eventos de hoy!</div>
        <div class="panel-body" id="body-panel">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Hora</th>
                <th scope="col">Título</th>
                <th scope="col">Contenido</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $eventos_hoy = $db->query("SELECT *,  DATE_FORMAT(for_the, 'El %d %M %Y' ) AS fechaEvento FROM events WHERE validity = 1 ORDER BY for_the limit 0,3");
                while($evento = $eventos_hoy->fetch()) {
                  $enlace = $evento['place'];
              ?>
              <tr>
                <th scope="row"><?= $evento['fechaEvento']; ?></th>
                <td><?= $evento['title']; ?></td>
                <td><a onclick="location.href='<?= $enlace; ?>';"><?= $evento['text']; ?></a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <?php
            $hoy = strftime('%e %B %Y %A');
            echo "Hoy es <b>" . $hoy . ",</b> ¡estás participando en los eventos de hoy, tal vez ganes un gran premio!";
          ?>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" id="bg-panel">Comentarios</div>
        <ul class="list-group">
          <?php
            $comentarios_recientes = $db->query("SELECT * FROM comments ORDER BY post_at DESC LIMIT 0,5");
            while($comentario = $comentarios_recientes->fetch()) {
              $autor_info = $db->prepare("SELECT * FROM users WHERE id = ?");
              $autor_info->execute(array($comentario['author']));
              $autor = $autor_info->fetch();
              $noticia_info = $db->prepare("SELECT * FROM news WHERE id = ?");
              $noticia_info->execute(array($comentario['news']));
              $noticia = $noticia_info->fetch();
          ?>
          <li class="list-group-item">
            <a href="/article/<?= $noticia['id']; ?>" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="<?= $noticia['title'] ?>" data-original-title="<?= $autor['username']; ?>">
              <img style="margin-right:10px;" src="http://www.habbo.com.tr/habbo-imaging/avatarimage?&user=<?= $autor['username'] ?>&action=&direction=3&head_direction=3&img_format=png&gesture=spk&headonly=1&size=b">
              <?= ($comentario['comment']) ?>
            </a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php require "includes/footer.php"; ?>
</html>