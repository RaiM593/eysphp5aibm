<?php
class Direccion {
    private $conn;
    private $table_name = "direccion";

    public $id;
    public $descripcion;

    public function __construct($db) {
        $this->conn = $db;
    }

    // CREATE
    public function create() {
        try {
            $query = "INSERT INTO " . $this->table_name . " (descripcion)
                      VALUES (:descripcion)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":descripcion", $this->descripcion);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error en create(): " . $e->getMessage());
            return false;
        }
    }

    // READ ALL
    public function read() {
        try {
            $query = "SELECT * FROM " . $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en read(): " . $e->getMessage());
            return [];
        }
    }

    // UPDATE
    public function update() {
        try {
            $query = "UPDATE " . $this->table_name . "
                      SET descripcion = :descripcion
                      WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":descripcion", $this->descripcion);
            $stmt->bindParam(":id", $this->id);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error en update(): " . $e->getMessage());
            return false;
        }
    }

    // DELETE
    public function delete() {
        try {
            $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":id", $this->id);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error en delete(): " . $e->getMessage());
            return false;
        }
    }
}
?>