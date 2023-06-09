<?php
include('utils/connectDB.php');
$title = "Accueil";
include('templates/parts/header.php');
$pdo = connectDB();
?>
<div class = " hero ">  
</div>
<div class="container-fluid bg-secondary mt-5 pt-5">
<div class='card-group'>
    <div class='row d-flex justify-content-center mb-3'>
        <?php
     $nfts = getAllNft($pdo);
    foreach ($nfts as $nft) {

    include('templates/nft/nftCard.php');
    
    }
        ?>
    </div>
</div>
</div>

<?php
include('templates/parts/footer.php');
?>


