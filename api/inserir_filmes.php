<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../model/Filme.php");
require_once(__DIR__ . "/../model/Generos.php");
require_once(__DIR__ . "/../model/Paises.php");
require_once(__DIR__ . "/../controller/filmeController.php");

//Capturar os parâmetros POST
$nome = $_POST['nome'] ? $_POST['nome'] : null;
$lanca = is_numeric($_POST['lanca']) ? $_POST['lanca'] : 0;
$dir = $_POST['dir'] ? $_POST['dir'] : null;
$idGen = is_numeric($_POST['genero']) ? 
                $_POST['genero'] : 0;
$idPais = is_numeric($_POST['pais']) ? 
                    $_POST['pais'] : 0;

$filme = new Filme();

//Sets dos valores do Filme
$filme->setNome($nome);
$filme->setDiretor($dir);
$filme->setAnoLancamento($lanca);
if($idGen) {
    $gen = new Genero();
    $gen->setId($idGen);
    $filme->setGen($gen);
}
if($idPais) {
    $pais = new Paises();
    $pais->setId($idPais);
    $filme->setPais($pais);
}


//Chamar o controller para salvar o Filme
$filmCont = new filmeController();
$erros = $filmCont->inserir($filme);

//Retornar os erros ou 
//uma string vazia se não houverem erros
$msgErro = "";
if($erros)
    $msgErro = implode("<br>", $erros);

echo $msgErro;


