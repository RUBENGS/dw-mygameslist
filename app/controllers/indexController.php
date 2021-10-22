<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/JuegoDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Juego.php');


function indexAction() {
    $juegoDAO = new JuegoDAO();
    return $juegoDAO->selectAll();
}

?>