<?php
include('utils/connectDB.php');
$title = "Accueil";
include('templates/parts/header.php');
?>
<div class="container-fluid bg-secondary mt-5 pt-5">
<div class='card-group'>
    <!-- Affichage -->
    <div class='row d-flex justify-content-center mb-3'>
        <?php
     $nfts = getAllNft();
    foreach ($nfts as $nft) {

    include('templates/nft/nftCard.php');
    
    }
        ?>
    </div>
</div>
</div>


<?php
include('parts/footer.php');
?>

<!-- // var_dump($reponse->fetchAll());
// $query = $pdo->prepare(query:'SELECT * FROM nft WHERE id_nft_collection = ? AND id_user = ?');
// $query->execute([$_GET['id_nft_collection'], $_GET['id_user']]);
// $query = $pdo->prepare(query:'SELECT * FROM nft');
// $query->execute([$_GET['id_nft_collection'], $_GET['id_user']]);
// pour filtrer faire requete préparer quand on a une variable -->
<!-- while ($nft = $query->fetch()) {
    echo "<div class='card d-flex justify-content-center flex_wrap' style='width: 18rem;'> 
      <img src='http://localhost/marketplace/uploads/{$nft['image']}' class='card-img-top' alt='...'>
      <div class='card-body'>
        <p class='card-text'>{$nft['name']}</p>
      </div>
      <div class='card-body'>{$nft['price']}
    </div>"; -->

