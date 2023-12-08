<?php
    class GeneroDAO {
        private $conn;

        public function __construct() {
            $this->conn = Connection::getConnection();
        }

        // Função para mapear os resultados do banco para objetos da classe 'Genero'
        private function mapBancoParaObjeto($result) {
            $Generos = array();

            foreach ($result as $reg) {
                $Genero = new Genero();
                $Genero->setId($reg['id'])
                    ->setGenero($reg['gen']);
                
                $Generos[] = $Genero;
            }

            return $Generos;
        }

        // Função para listar todos os países
        public function list() {
            $sql = "SELECT id, gen FROM generos";

            $resultado = $this->conn->query($sql);

            if (!$resultado) {
                // Tratar erros, por exemplo:
                die("Erro na consulta: " . $this->conn->errorInfo());
            }

            return $this->mapBancoParaObjeto($resultado);
        }
    }
