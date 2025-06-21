<?php
//  :¨·.·¨: 
//  `·.  Discord : Hasanx ★°*ﾟ
// Hasanxuk Cms★°*ﾟ Editado por Hasanx
?>

<?php require "includes/config.php"; ?>
<?php require "includes/header.php"; ?>
<?php require "includes/alerte.php"; ?>

<?php
$porPagina = 6;
$contarNoticias = $db->query("SELECT id FROM news WHERE validity = 1");
$totalNoticias = $contarNoticias->rowCount();
$totalPaginas = ceil($totalNoticias / $porPagina);

$paginaActual = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, [
    'options' => ['default' => 1, 'min_range' => 1],
]);

$inicio = ($paginaActual - 1) * $porPagina;
?>

<div class="container" style="margin-top:20px;">
  <div class="row">
    <div class="col-sm-12">
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
        $cargar_todas_noticias = $db->query("SELECT * FROM news WHERE validity = 1 ORDER BY post_at DESC LIMIT " . $inicio . "," . $porPagina);
        while($noticia = $cargar_todas_noticias->fetch()) {
            $cargar_autor = $db->prepare("SELECT * FROM users WHERE id = ?");
            $cargar_autor->execute(array($noticia['author']));
            $autor = $cargar_autor->fetch();
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
        <div class="col-sm-12 pagination">
          <div class="pagination">
            <?php
            for ($i = 1; $i <= $totalPaginas; $i++) {
                if ($i == $paginaActual) {
                    echo '<span class="page-actuel">' . $i . '</span>';
                } else {
                    echo '<a href="/articles?page=' . $i . '">' . $i . '</a>';
                }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="principal-droite">
      <!-- Espacio para futuros widgets o información adicional -->
    </div>
  </div>
</div>
<?php require "includes/footer.php"; ?>
</html>