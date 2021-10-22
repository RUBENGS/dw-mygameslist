<?php

//dirname(__FILE__) Es el directorio del archivo actual
require_once(dirname(__FILE__) . '/../conf/PersistentManager.php');

class JuegoDAO {

    //Se define una constante con el nombre de la tabla
    const JUEGO_TABLE = 'juegos';

    //Conexión a BD
    private $conn = null;

    //Constructor de la clase
    public function __construct() {
        $this->conn = PersistentManager::getInstance()->get_connection();
    }

    public function selectAll() {
        $query = "SELECT * FROM " . JuegoDAO::JUEGO_TABLE;
        $result = mysqli_query($this->conn, $query);
        $juegos = array();
        while ($juegoBD = mysqli_fetch_array($result)) {

            $juego = new Juego();
            $juego->setIdJuego($juegoBD["idJuego"]);
            $juego->setNombre($juegoBD["nombre"]);
            $juego->setDescripcion($juegoBD["descripcion"]);
            $juego->setCaratula($juegoBD["caratula"]);
            $juego->setPrecio($juegoBD["precio"]);

            array_push($juegos, $juego);
        }
        return $juegos;
    }

    public function insert($juego) {
        $query = "INSERT INTO " . JuegoDAO::JUEGO_TABLE .
            " (nombre, descripcion, caratula, precio) VALUES(?,?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $nombre = $juego->getNombre();
        $descripcion = $juego->getDescripcion();
        $caratula = $juego->getCaratula();
        $precio = $juego->getPrecio();

        mysqli_stmt_bind_param($stmt, 'ssss', $nombre, $descripcion, $caratula, $precio);
        return $stmt->execute();
    }

    public function selectById($id) {
        $query = "SELECT nombre, descripcion, caratula, precio FROM " . JuegoDAO::JUEGO_TABLE . " WHERE idJuego=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $nombre, $descripcion, $caratula, $precio);

        $juego = new Juego();
        while (mysqli_stmt_fetch($stmt)) {
            $juego->setIdJuego($id);
            $juego->setNombre($nombre);
            $juego->setDescripcion($descripcion);
            $juego->setCaratula($caratula);
            $juego->setPrecio($precio);
        }

        return $juego;
    }

    public function update($juego) {
        $query = "UPDATE " . JuegoDAO::JUEGO_TABLE .
            " SET nombre=?, descripcion=?, caratula=?, precio=?"
            . " WHERE idJuego=?";
        $stmt = mysqli_prepare($this->conn, $query);
        $nombre = $juego->getNombre();
        $descripcion= $juego->getDescripcion();
        $caratula = $juego->getCaratula();
        $id = $juego->getIdJuego();
        $precio = $juego->getPrecio();
        mysqli_stmt_bind_param($stmt, 'sssss', $nombre, $descripcion, $caratula, $precio, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . JuegoDAO::JUEGO_TABLE . " WHERE idJuego=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return $stmt->execute();
    }


}

?>
