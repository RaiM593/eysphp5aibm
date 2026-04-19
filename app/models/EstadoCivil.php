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