<?php
    /*require_once(__DIR__ . "/../dao/filmeDAO.php");
    require_once(__DIR__ . "/../dao/generoDAO.php");


    class GeneroController {

    private $genDAO;
    private $conn;


    public function __construct() {
        $this->conn = Connection::getConnection();
        $this->genDAO = new generoDAO();
    }

        // Função para listar todos os países
        public function listar() {
            $genero = $this->genDAO->list();

            return $genero;
        }
    }*/

    require_once(__DIR__ . "/../dao/filmeDAO.php");
    require_once(__DIR__ . "/../dao/generoDAO.php");

    
    class generoController {
        private $conn;
        private $generoDAO;

    public function __construct() {
        $this->conn = Connection::getConnection();
        $this->generoDAO = new GeneroDAO();
    }

        // Função para listar todos os países
        public function listar() {
            $genero = $this->generoDAO->list();

            return $genero;
        }
    }
