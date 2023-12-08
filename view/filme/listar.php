<?php 
//Página view para listagem de filmes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../../controller/filmeController.php");

$filmeCont = new filmeController();
$filmes = $filmeCont->listar();
//print_r($filmes);
?>

<?php 
require(__DIR__ . "/../include/header.php");
?>

<h4>Listagem de filmes</h4>

<div>
    <a class="btn btn-success" href="inserir.php">Inserir</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Título</th>
            <th>Lancamento</th>
            <th>Gênero</th>
            <th>Diretor</th>
            <th>País</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($filmes as $f): ?>
            <tr>
                <td><?= $f->getNome(); ?></td>
                <td><?= $f->getAnoLancamento();?></td>
                <td><?= $f->getGen(); ?></td>
                <td><?= $f->getDiretor(); ?></td>
                <td><?= $f->getPais(); ?></td>
                <td>
                    <a href="alterar.php?idfilme=<?= $f->getId() ?>"> 
                        <img src="../../img/btn_editar.png" />
                    </a>
                </td>
                <td>
                    <a href="excluir.php?idFilme=<?= $f->getId() ?>"
                       onclick="return confirm('Confirma a exclusão?');" > 
                        <img src="../../img/btn_excluir.png" />
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



<?php 
require(__DIR__ . "/../include/footer.php");
?>
    