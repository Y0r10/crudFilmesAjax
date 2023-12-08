<?php 
//View para alterar filmes

require_once(__DIR__ . "/../../controller/filmeController.php");
require_once(__DIR__ . "/../../model/Filme.php");
require_once(__DIR__ . "/../../model/Generos.php");
require_once(__DIR__ . "/../../model/Paises.php");


$msgErro = '';
$filme = null;

$filmeCont = new filmeController();

if(isset($_POST['submetido'])) {
    //Usuário clicou no botão gravar (submeteu o formulário)
    //Captura os campo do formulário
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $anoLancamento = $_POST['lanca'] ? $_POST['lanca'] : null;
    $diretor = trim($_POST['dir']) ? trim($_POST['dir']) : null;
    $idGen = is_numeric($_POST['gen']) ? $_POST['gen'] : null;
    $idPais = is_numeric($_POST['pais']) ? $_POST['pais'] : null;


    $idfilme = $_POST['id'];
    
    //Criar um objeto filme para persistência
    $filme = new filme();
    $filme->setId($idfilme);
    $filme->setNome($nome);
    $filme->setAnoLancamento($anoLancamento);
    $filme->setDiretor($diretor);
    if($idGen) {
        $Gen = new Genero();
        $Gen->setId($idGen);
        $filme->setGen($Gen);
    }
    if($idPais) {
        $p = new Paises();
        $p->setId($idPais);
        $filme->setPais($p);
    }

    //Criar um filmeController 
    $filmeCont = new filmeController();
    $erros = $filmeCont->atualizar($filme);

    if(! $erros) { //Caso não tenha erros
        //Redirecionar para o listar
        header("location: listar.php");
        exit;
    } else { //Em caso de erros, exibí-los
        $msgErro = implode("<br>", $erros);
        //print_r($erros);
    }



} else {
    //Usuário apenas entrou na página para alterar
    $idfilme = 0;
    if(isset($_GET['idfilme']))
        $idfilme = $_GET['idfilme'];
    
    $filme = $filmeCont->buscarPorId($idfilme);
    if(! $filme) {
        echo "filme não encontrado!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }

}

//Inclui o formulário
include_once(__DIR__ . "/form.php");