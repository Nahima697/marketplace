<?php 

if(isset($_SESSION)) {
  session_start();
  $userName = $_SESSION['userName'];
  $userId = $_SESSION['userId'];
  
}

?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/marketplace/index.php"><img src ="http://localhost/marketplace/image/logo.png">NFT MarketPlace</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/marketplace/index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/marketplace/gallery.php">Gallery</a>
        </li>
      </ul>
      <form class="d-flex" role="search" method="GET">
        <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success me-3" type="submit">Search</button>
      </form>
  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Connexion
    </button>
    <ul class="dropdown-menu">
        <?php
        if(isset($_SESSION["userName"])) {
            ?>
            <li><a class="btn text-light" href="http://localhost/marketplace/templates/parts/updateUser.php".userId><img src="http://localhost/marketplace/image/person-fill-gear.svg"></a></li>
            <li><a class="btn text-light" href="http://localhost/marketplace/templates/parts/validationConnexion.php?logout=true"><img src="http://localhost/marketplace/image/person-down.svg"></a></li>
            <?php
        } else {
            ?>
            <li><a href="http://localhost/marketplace/templates/parts/connection.php"><img src="http://localhost/marketplace/image/person-circle.svg"></a></li>
            <?php
        }
        ?>
    </ul>
</div>
    </div>
  </div>
</nav>