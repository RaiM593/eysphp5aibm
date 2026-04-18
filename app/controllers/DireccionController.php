<?php

require_once("../models/Direccion.php");

class DireccionController {

    private $db;
    private $direccion;

    public function __construct($db) {
        $this->db = $db;
        $this->direccion = new Direccion($db);
    }

    // LISTAR DIRECCIONES
    public function index() {
        return $this->direccion->read();
    }

    // CREAR DIRECCION
    public function store($data) {
        $this->direccion->descripcion = $data['descripcion'];
        return $this->direccion->create();
    }

    // ACTUALIZAR DIRECCION
    public function update($data) {
        $this->direccion->id = $data['id'];
        $this->direccion->descripcion = $data['descripcion'];
        return $this->direccion->update();
    }

    // ELIMINAR DIRECCION
    public function delete($id) {
        $this->direccion->id = $id;
        return $this->direccion->delete();
    }
}
?>