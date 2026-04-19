<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/eysphp/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/eysphp/app/models/EstadoCivil.php';

class EstadoCivilController {

    private $estadocivil;
    private $db;

    public function __construct(){

        $this->db = (new Database())->getConnection();
        $this->estadocivil = new EstadoCivil($this->db);
    }

    public function index(){

        $datos = $this->estadocivil->read();
        require_once '../app/views/estadocivil/index.php';

    }

}