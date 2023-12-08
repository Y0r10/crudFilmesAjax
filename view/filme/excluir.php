<?php
//View para excluir um Filme

require_once(__DIR__ . '/../../controller/filmeController.php');

//Receber o parâmetro
$idFilme = 0;
if(isset($_GET['idFilme']))
    $idFilme = $_GET['idFilme'];

//Carregar o Filme 
$FilmeCont = new filmeController();   
$Filme = $FilmeCont->buscarPorId($idFilme);

//Verificar se o Filme existe
if(! $Filme) {
    echo "Filme não encontrado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
    exit;
}

//Excluir o Filme
$FilmeCont->excluirPorId($Filme->getId());

//Redirecionar para a listar
header("location: listar.php");