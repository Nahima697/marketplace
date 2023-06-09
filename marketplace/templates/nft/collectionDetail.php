<?php
include('../../utils/functions.php');
include('../parts/header.php');
$pdo = connectDB();
if (isset($_GET["id"])) {
    $nftCollectionId = intval($_GET['id']);
    $nft_collections = getNftsByCollectionId($pdo,intval($nftCollectionId));
    if ($nft_collections) {
        ?>
        <div class="container p-3">
        <div class="row">
                <?php foreach ($nft_collections as $nft_collection) {
                    if ($nft_collection['id'] != $nftCollectionId) {
                        ?>
                        <div class="col-md-3">
                            <div class="card mb-3">
                                <img class="card-img-top" src="http://localhost/marketplace/uploads/<?php echo $nft_collection['image']; ?>" alt="<?php echo $nft_collection['name']; ?>">
                                <div class="card-body">  
                                <h5 class="card-title text-center"><?php echo $nft_collection['nft_name']; ?></h5>         
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <?php
    }
}

include('../parts/footer.php');
?>
