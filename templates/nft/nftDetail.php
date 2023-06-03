<?php include('../../utils/functions.php');
include ('../parts/header.php');

// Vérifier si l'utilisateur a un ID spécifié
if (isset($_GET["id"])) {
    $nftId = intval($_GET['id']);
    $nft = getNftById($nftId);

    if ($nft && isset($nft['id_user'])) {
        $userId = $nft['id_user'];
        $nftCount = countNftUser($userId);
        ?>
        <div class="text-center col-md-6 container p-3">  
            <div class="card w-75">
            <h2>Owner: <?php echo $nft["user_name"]; ?></h2>
            <p>Nombre de NFTs possédés par l'utilisateur : <?php echo $nftCount; ?></p>
            <h2><?php echo $nft['name']; ?></h2>
            <img class="card-img " src="http://localhost/marketplace/uploads/<?php echo $nft['image']; ?>" alt="<?php echo $nft['name']; ?>">
            <p>Collection: <?php echo $nft['collection_name']; ?></p>
            <p>Price: <?php echo $nft['price'] . " ETH"; ?></p>
            </div>          
        </div>

        <hr>

        <h3 class="text-center">Autres NFTs de l'utilisateur</h3>

        <div class="row">
            <?php
            $userNfts = getNftsByUserId($userId);

            foreach ($userNfts as $nftItem) {
                if ($nftItem['id'] !== $nftId) {
                    ?>
                    <div class="col-md-3">
                        <div class="card mb-3">
                        <a href="http://localhost/marketplace/templates/nft/nftDetail.php?id=<?php echo intval($nftItem['id']); ?>">
                            <img class="card-img-top" src="http://localhost/marketplace/uploads/<?php echo $nftItem['image']; ?>" alt="<?php echo $nft['name']; ?>">
                        </a>                           
                            <div class="card-body">
                            <h5 class="card-title"><?php echo $nftItem['name']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <?php
    }
}
?>
