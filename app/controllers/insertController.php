<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/JuegoDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Juego.php');
require_once(dirname(__FILE__) . '/../../app/models/validations/ValidationsRules.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Llamo a la función en cuanto se redirija el action a esta página
    createAction();
}

function createAction() {
    $nombre = ValidationsRules::test_input($_POST["nombre"]);
    $descripcion = ValidationsRules::test_input($_POST["descripcion"]);
    $caratula = ValidationsRules::test_input($_POST["caratula"]);
    // TODOD hacer uso de los valores validados 
    $juego = new Juego();
    $juego->setNombre($_POST["nombre"]);
    $juego->setDescripcion($_POST["descripcion"]);
    $juego->setCaratula($_POST["caratula"]);
    $juego->setPrecio($_POST["precio"]);

    //Creamos un objeto CreatureDAO para hacer las llamadas a la BD
    $juegoDAO = new JuegoDAO();
    $juegoDAO->insert($juego);
    
    header('Location: ../../index.php');
    
}
?>

