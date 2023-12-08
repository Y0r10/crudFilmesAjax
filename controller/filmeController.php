<?php 
//Controller para filme

require_once(__DIR__ . "/../dao/filmeDAO.php");
require_once(__DIR__ . "/../model/Filme.php");
require_once(__DIR__ . "/../service/FilmeService.php");

class filmeController {

    private $filmeDAO;
    private $filmeService;

    public function __construct() {
        $this->filmeDAO = new filmeDAO();        
        $this->filmeService = new FilmeService();
    }

    public function listar() {
        return $this->filmeDAO->list();        
    }

    public function inserir(filme $filme) {
        //Valida e retorna os erros caso existam
        $erros = $this->filmeService->validarDados($filme);
        if($erros) 
            return $erros;

        //Persiste o objeto e retorna um array vazio
        $this->filmeDAO->insert($filme);
        return array();
    }

    public function buscarPorId(int $id) {
        return $this->filmeDAO->findById($id);
    }

    public function excluirPorId(int $id) {
        $this->filmeDAO->deleteById($id);
    }

    public function atualizar(Filme $filme) {
        $erros = $this->filmeService->validarDados($filme);
        if($erros) 
            return $erros;
        
        //Persiste o objeto e retorna um array vazio
        $this->filmeDAO->update($filme);
        return array();
    }


}