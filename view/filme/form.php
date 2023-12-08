<?php 
//Formulário para filmes

require_once(__DIR__ . "/../../controller/paisController.php");
require_once(__DIR__ . "/../../controller/generoController.php");
require_once(__DIR__ . "/../include/header.php");

$paisCont = new paisController();
$pais = $paisCont->listar();
$genCont = new generoController();
$gen = $genCont->listar();
//print_r($gen);
?>

<h2><?php echo (!$filme || $filme->getId() <= 0 ? 'Inserir' : 'Alterar') ?> filme</h2>

<div class="row mb-3">
    <div class="col-6">
        <form id="frmfilme" method="POST" >

            <div class="form-group">
                <label for="txtNome">Título:</label>
                <input type="text" name="nome" id="txtTit" class="form-control"
                    value="<?php echo ($filme ? $filme->getNome() : ''); ?>" />
            </div>

            <div class="form-group">
                <label for="txtIdade">Ano de Lancamento:</label>
                <input type="number" name="lanca" id="txtLanca" class="form-control"
                    value="<?php echo ($filme ? $filme->getAnoLancamento() : ''); ?>" />
            </div>

            <div class="form-group">
                <label for="txtDir">Diretor(a):</label>
                <input type="text" name="dir" id="txtDir" class="form-control"
                    value="<?php echo ($filme ? $filme->getDiretor() : ''); ?>" />
            </div>

            

            <div class="form-group">
                <label for="selpais">País:</label>
                <select id="selpais" name="pais" class="form-control">
                    <option value="">---Selecione---</option>
                    
                    <?php foreach($pais as $pais): ?>
                        <option value="<?= $pais->getId(); ?>"
                            <?php 
                                if($filme && $filme->getPais() && 
                                    $filme->getPais()->getId() == $pais->getId())
                                    echo 'selected';
                            ?>
                        >
                            <?= $pais->getPais(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="selgen">Gênero:</label>
                <select id="selgen" name="gen" class="form-control">
                    <option value="">---Selecione---</option>
                    
                    <?php foreach($gen as $gen): ?>
                        <option value="<?= $gen->getId(); ?>"
                            <?php 
                                if($filme && $filme->getGen() && 
                                    $filme->getGen()->getId() == $gen->getId())
                                    echo 'selected';
                            ?>
                        >
                            <?= $gen->getGenero(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="hidden" name="id" 
                value="<?php echo ($filme ? $filme->getId() : 0); ?>" />
            
            <input type="hidden" name="submetido" value="1" />

            <!--button type="submit" class="btn btn-success">Gravar</button-->
            <button type="button" class="btn btn-success" onclick="inserirFilmes()">Gravar</button>
            <button type="reset" class="btn btn-info">Limpar</button>
        </form>
    </div>

    <div class="col-6">
        <?php if($msgErro): ?>
            <div class="alert alert-danger">
                <?php echo $msgErro; ?>
            </div>
        <?php endif; ?>
        
        <div id="divMsgErro" class="alert alert-danger" style="display: none;">
            
        </div>
    </div>    
</div>

<a href="listar.php" class="btn btn-outline-secondary">Voltar</a>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>

<script src="js/filmes.js"></script>