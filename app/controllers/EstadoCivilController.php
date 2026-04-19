
<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT'] . '/eysphp/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/eysphp/app/models/EstadoCivil.php';

class EstadoCivilController {
    private $estado;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->estado = new EstadoCivil($this->db);
    }

    // LISTAR
    public function index() {
        $estados = $this->estado->read();
        require_once '../app/views/estadocivil/index.php';
    }

    // CREAR
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre'])) {
                $this->estado->nombre = $_POST['nombre'];

                if ($this->estado->create()) {
                    echo "Estado civil creado";
                } else {
                    echo "Error al crear";
                }
            } else {
                echo "Faltan datos";
            }
        }
        die();
    }

    // EDITAR (mostrar formulario)
    public function edit($id) {
        $this->estado->id = $id;
        $estado = $this->estado->readOne();

        if (!$estado) {
            die("No existe el registro");
        }

        require_once '../app/views/estadocivil/edit.php';
    }

    // ACTUALIZAR
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre'], $_POST['id'])) {

                $this->estado->nombre = $_POST['nombre'];
                $this->estado->id = $_POST['id'];

                if ($this->estado->update()) {
                    echo "Actualizado correctamente";
                } else {
                    echo "Error al actualizar";
                }

            } else {
                echo "Faltan datos";
            }
        }
        die();
    }

    // ELIMINAR
    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id'])) {

                $this->estado->id = $_POST['id'];

                if ($this->estado->delete()) {
                    echo "Eliminado correctamente";
                } else {
                    echo "Error al eliminar";
                }

            } else {
                echo "Faltan datos";
            }
        }
        die();
    }
}

// RUTEO
if (isset($_GET['action'])) {
    $controller = new EstadoCivilController();

    switch ($_GET['action']) {
        case 'create':
            $controller->create();
            break;

        case 'update':
            $controller->update();
            break;

        case 'delete':
            $controller->delete();
            break;

        default:
            echo "Acción no válida";
            break;
    }
} else {
    echo "No se especificó acción";
}


