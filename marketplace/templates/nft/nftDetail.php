<?php include('../../utils/functions.php');
include ('../parts/header.php');
$pdo = connectDB();
if (isset($_GET["id"])) {
    $nftId = intval($_GET['id']);
    $nft = getNftById($pdo,$nftId);

    if ($nft && isset($nft['id_user'])) {
        $userId = $nft['id_user'];
        $nftCount = countNftUser($pdo,$userId);
        ?>
        <div class="container">
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
        </div>
        
        <?php
    }}