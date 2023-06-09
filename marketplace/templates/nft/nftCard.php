
<div class="card col-md-3 m-3">
    <p class='card-title text-center'><?php echo $nft['name']; ?></p>
    <div class='card-body text-center'>
        <div class="image-container">
        <a href="http://localhost/marketplace/templates/nft/nftDetail.php?id=<?php echo intval($nft['id']); ?>">
                <img class="img-fluid card-img" src="http://localhost/marketplace/uploads/<?php echo $nft['image']; ?>" alt="<?php echo $nft['name']; ?>">
            </a>
        </div>
        <a href="http://localhost/marketplace/userProfile.php?id=<?php echo intval($nft['user_id']); ?>">
        <p><?php echo $nft['user_name']; ?></p></a>
        <a href="http://localhost/marketplace/templates/nft/collectionDetail.php?id=<?php echo intval($nft['id_nft_collection']); ?>">
        <p><?php echo $nft['collection_name']; ?></p></a>
    </div>
    <div class='card-footer text-center'>
        <p><?php echo $nft['price'] . " ETH"; ?></p>
    </div>  
</div>

<?php
// if (isset $_GET['name'] ) {
    

// }
?>

