<?php 
//View para inserir filmes


require_once(__DIR__ . "/../../controller/filmeController.php");
require_once(__DIR__ . "/../../model/Filme.php");
require_once(__DIR__ . "/../../model/Generos.php");
require_once(__DIR__ . "/../../model/Paises.php");


$msgErro = '';
$filme = null;

if(isset($_POST['submetido'])) {
    //echo "clicou no gravar";
    //Captura os campo do formulário
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $lancamento = $_POST['lanca'] ? $_POST['lanca'] : null;
    $diretor = trim($_POST['dir']) ? trim($_POST['dir']) : null;
    $idPais = is_numeric($_POST['pais']) ? $_POST['pais'] : null;
    $idGen = is_numeric($_POST['gen']) ? $_POST['gen'] : null;

    
    //Criar um objeto filme para persistência
    $filme = new Filme();
    $filme->setNome($nome);
    $filme->setAnoLancamento($lancamento);
    $filme->setDiretor($diretor);
    if($idPais) {
        $pais = new Paises();
        $pais->setId($idPais);
        $filme->setPais($pais);
    }
    if($idGen) {
        $gen = new Genero();
        $gen->setId($idGen);
        $filme->setGen($gen);
    }

    //Criar um filmeController
    $filmeCont = new filmeController();
    $erros = $filmeCont->inserir($filme);

    if(! $erros) { //Caso não tenha erros
        //Redirecionar para o listar
        header("location: listar.php");
        exit;
    } else { //Em caso de erros, exibí-los
        $msgErro = implode("<br>", $erros);
        //print_r($erros);
    }
}


//Inclui o formulário
include_once(__DIR__ . "/form.php");
