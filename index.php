<?php
//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/app/controllers/indexController.php');

//Recupero de la BD todas las criaturas a través del controlador
$juegos = indexAction();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RolePlayingGame</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-light navbar-fixed-top navbar-expand-md bg-faded" role="navigation"
     style="background-color: #FFBF00;">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand w-50" href="index.php"> <img class="d-block w-75 m-auto" src="assets/img/mygamelist-logo.png" alt=""></a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item active">
                <a type="button" class="btn btn-secondary" href="app/views/insert.php">Añadir un juego</a>
            </li>
        </ul>

    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <!-- Heading Row -->
    <div class="row">
        <div class="col-xl-8">
            <img class="img-responsive img-rounded d-block m-auto w-100" src="assets/img/main-logo2.jpg" alt="">
        </div>
        <!-- /.col-md-8 -->
        <div class="col-xl-4">
            <h1>Comunidad de usuarios de videojuegos</h1>
            <p>Encuentra el mejor para tu gusto y disfrútalo</p>
            <a class="btn btn-secondary btn-lg" href="https://store.steampowered.com/?l=spanish">Juega ahora!</a>
        </div>
    </div>
</div>
<!-- /.row -->

<hr>


<!-- Content Row -->
<?php for ($i = 0; $i < sizeof($juegos); $i += 3) { ?>
    <!--   <div class="card-group">   -->
    <div class="row">
        <?php
        for ($j = $i; $j < ($i + 3); $j++) {
            if (isset($juegos[$j])) {

                echo $juegos[$j]->juego2HTML();
            }
        }
        ?>
    </div>
    <!-- /.row -->
<?php } ?>

<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; R. G. 2021</p>
        </div>
    </div>
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="assets/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>

</body>

</html>
