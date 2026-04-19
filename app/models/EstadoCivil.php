<<<<<<< HEAD
<?php

class EstadoCivil {

    private $conn;
    private $table = "estado_civil";

    public $id;
    public $descripcion;

    public function __construct($db){
        $this->conn = $db;
    }

    public function read(){

        $query = "SELECT * FROM estado_civil";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function create(){

        $query = "INSERT INTO estado_civil (descripcion) VALUES (:descripcion)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":descripcion",$this->descripcion);

        return $stmt->execute();
    }

}
=======
<?php
class EstadoCivil {
    private $conn;
    private $table = "estado_civil";

    public $id;
    public $nombre;

    public function __construct($db) {
        $this->conn = $db;
    }

    // LISTAR
    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // CREAR
    public function create() {
        $query = "INSERT INTO " . $this->table . " (nombre) VALUES (:nombre)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre", $this->nombre);

        return $stmt->execute();
    }

    // OBTENER UNO
    public function readOne() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ACTUALIZAR
    public function update() {
        $query = "UPDATE " . $this->table . " SET nombre = :nombre WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    // ELIMINAR
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }
}
?>
>>>>>>> c1ea4bca80c64c135080060c809e60c267879992
