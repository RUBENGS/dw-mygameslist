<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/JuegoDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Juego.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    editAction();
}

function editAction() {
    
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $caratula = $_POST["caratula"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];

    $juego = new Juego();
    $juego->setIdJuego($id);
    $juego->setNombre($nombre);
    $juego->setCaratula($caratula);
    $juego->setDescripcion($descripcion);
    //$juego->setPrecio($precio);
    $juego->setPrecio($_POST["precio"]);

    $juegoDAO = new JuegoDAO();
    $juegoDAO->update($juego);

    header('Location: ../../index.php');
}

?>

