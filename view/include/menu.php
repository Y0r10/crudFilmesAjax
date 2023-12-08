<?php
require_once(__DIR__ . "/../../util/config.php");
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <a class="navbar-brand" href="#">CRUD Filmes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?= BASE_URL ?>/index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL ?>/view/filme/listar.php">Filmes</a>
      </li>
      </li>
    </ul>
  </div>
</nav>