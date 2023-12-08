<?php

    require_once(__DIR__ . "/../dao/filmeDAO.php");
    require_once(__DIR__ . "/../dao/paisDAO.php");

    
    class paisController {
        private $conn;
        private $paisDAO;

    public function __construct() {
        $this->conn = Connection::getConnection();
        $this->paisDAO = new PaisDAO();
    }

        // Função para listar todos os países
        public function listar() {
            $pais = $this->paisDAO->list();

            return $pais;
        }
    }

