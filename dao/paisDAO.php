<?php
    class PaisDAO {
        private $conn;

        public function __construct() {
            $this->conn = Connection::getConnection();
        }

        // Função para mapear os resultados do banco para objetos da classe 'Pais'
        private function mapBancoParaObjeto($result) {
            $paises = array();

            foreach ($result as $reg) {
                $pais = new Paises();
                $pais->setId($reg['id'])
                    ->setPais($reg['pais']);
                
                $paises[] = $pais;
            }

            return $paises;
        }

        // Função para listar todos os países
        public function list() {
            $sql = "SELECT id, pais FROM paises";

            $resultado = $this->conn->query($sql);

            if (!$resultado) {
                // Tratar erros, por exemplo:
                die("Erro na consulta: " . $this->conn->errorInfo());
            }

            return $this->mapBancoParaObjeto($resultado);
        }
    }
