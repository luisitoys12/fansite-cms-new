<?php require "core.php"; ?>
<?php 
if (!isset($_SESSION['user']) || empty($user) || $user['staff'] == 0) {
    $alert->message("No tienes permiso para acceder a esta página.", "/inicio");
    exit; 
}
?>
<?php require "header.php"; ?>
<main class="bmd-layout-content">
    <div class="container-fluid">
        <!-- Panel principal de administración -->
        <div class="jumbotron shade pt-5">
            <h2>Bienvenido/a al Panel de Administración</h2>
            <p>Desde aquí puedes gestionar las noticias, usuarios, rangos, logs y otras configuraciones del fansite.</p>
            <ul>
                <li><a href="news.php">Gestionar noticias</a></li>
                <li><a href="logs.php">Ver registros</a></li>
                <li><a href="rank-list.php">Gestionar rangos</a></li>
                <li><a href="users.php">Gestionar usuarios</a></li>
                <li><a href="../index.php">Ir al sitio principal</a></li>
            </ul>
        </div>
    </div>
</main>
<?php require "footer.php"; ?>