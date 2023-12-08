<?php 
    //DAO para filme
    require_once(__DIR__ . "/../util/Connection.php");
    require_once(__DIR__ . "/../model/Filme.php");
    require_once(__DIR__ . "/../model/Generos.php");
    require_once(__DIR__ . "/../model/Paises.php");


    class filmeDAO {

    

        private $conn;

        public function __construct() {
            $this->conn = Connection::getConnection();
        }

        public function list() {
            $sql = "SELECT f.*, f.Nome, f.anoLancamento, f.Diretor, p.pais AS nomePais, g.gen AS nomeGenero
                    FROM filmes f
                    JOIN paises p ON f.id_pais = p.id
                    JOIN generos g ON f.id_genero = g.id
                    ORDER BY f.nome";
                   
                    
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();
            return $this->mapBancoParaObjeto($result);
        }
         

    public function findById(int $id) {
        $conn = Connection::getConnection();

        $sql =  "SELECT f.*, f.Nome, f.anoLancamento, f.Diretor, p.pais AS nomePais, g.gen AS nomeGenero
                FROM Filmes f
                JOIN Paises p ON f.id_pais = p.id
                JOIN Generos g ON f.id_genero = g.id  " . 
                " WHERE f.id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        //Criar o objeto Filme
        $filmes = $this->mapBancoParaObjeto($result);

        if(count($filmes) == 1)
            return $filmes[0];
        elseif(count($filmes) == 0)
            return null;

        die("filmeDAO.findById - Erro: mais de um filme".
                " encontrado para o ID " . $id);
    }

    //Converte do formato Banco (array associativo) para Objeto
    private function mapBancoParaObjeto($result) {
        $filmes = array();

        foreach($result as $reg) {
            $filme = new Filme();
            $filme->setId($reg['id'])
                ->setNome($reg['Nome'])
                ->setAnoLancamento($reg['anoLancamento']);
            $filme->setDiretor($reg['Diretor']);

            $pais = new Paises();
            $pais->setId($reg['id_pais'])
                ->setPais($reg['nomePais']);

            $filme->setPais($pais);

            $gen = new Genero();
            $gen->setId($reg['id_genero'])
                ->setGenero($reg['nomeGenero']);            
            $filme->setGen($gen);

            array_push($filmes, $filme);
        }

        return $filmes;
    }

    public function deleteById(int $id) {
        $conn = Connection::getConnection();

        $sql = "DELETE FROM filmes WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }

    public function update(Filme $filme) {
        $conn = Connection::getConnection();

        $sql = "UPDATE filmes SET nome = ?, anoLancamento = ?,". 
            " diretor = ?, id_genero = ?, id_pais = ?".
            " WHERE id = ?";        
        $stmt = $conn->prepare($sql);
        $stmt->execute([$filme->getNome(), $filme->getAnoLancamento(), 
                        $filme->getDiretor(), $filme->getGen()->getId(), $filme->getPais()->getId(),
                        $filme->getId()]);
    }

    public function insert(Filme $filme) {
        $sql = "INSERT INTO filmes" . 
                " (nome, anoLancamento, diretor, id_genero, id_pais)" .
                " VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$filme->getNome(), $filme->getAnoLancamento(), 
                        $filme->getDiretor(), 
                        $filme->getGen()->getId(),
                        $filme->getPais()->getId()]);
    }

}
