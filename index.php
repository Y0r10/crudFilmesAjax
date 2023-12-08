<?php

include_once(__DIR__ . "/view/include/header.php");
?>

<div class="row mt-3 justify-content-center">
    <div class="col-3">
        <div class="card text-center">
            <img class="card-image-top mx-auto" src="img/film_card.jpeg" 
                style="max-width: 200px; height: auto;" />
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="<?= BASE_URL ?>/view/filme/listar.php" 
                        class="card-link">
                        Listagem de Filmes</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-3">
        <div class="card text-center">
            <img class="card-image-top mx-auto" src="img/sessaoFilme.jpg" 
                style="max-width: 200px; height: auto;" />
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="<?= BASE_URL ?>/view/filme/listar.php" 
                        class="card-link">
                        Sessões de Filmes</a>
                </li>
            </ul>
        </div>
    </div>
</div>



<?php
include_once(__DIR__ . "/view/include/footer.php");
?>