<?php 
//Classe service para filme

require_once(__DIR__ . "/../model/Filme.php");

class filmeService {

    public function validarDados(Filme $filme) {
        $erros = array();
        
        //Validar o nome
        if(! $filme->getNome()) {
            array_push($erros, "Informe o nome!");
        }

        //Validar a idade
        if(! $filme->getDiretor()) {
            array_push($erros, "Informe o Diretor!");
        }

        //Validar estrangeiro
        if(! $filme->getAnoLancamento()) {
            array_push($erros, "Informe o Ano de lançamento!");
        }

        //Validar curso
        if(! $filme->getGen()) {
            array_push($erros, "Informe o genero!");
        }

        //Validar Paises
        if(! $filme->getPais()) {
            array_push($erros, "Informe o Pais de lançamento!");
        }

        return $erros;
    }

}