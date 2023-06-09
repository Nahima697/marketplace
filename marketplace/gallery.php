<?php
include('utils/functions.php');
include('templates/parts/header.php');
$pdo = connectDB();

$collections = getAllCollections($pdo);
?>
<div class="container">
<div class="row">
<?php
foreach ($collections as $collection) {
    $collectionId = $collection['id'];
    $nfts = getNftsByCollectionId($pdo,$collectionId);
        echo '<div class="card-body text-center">';
        echo '<h3 class="card-title">' . $collection['name'] . '</h3>';
        echo '<hr>';
        echo "<div class='row'>";
    foreach ($nfts as $nft) {
        echo '<div class="col-md-3">';
        echo '<div class="card mb-3">';
        echo "<p>" . $nft['name'] . "</p>";
        echo "<img class='card-img-top' src='http://localhost/marketplace/uploads/" . $nft['image'] . "' alt='" . $nft['name'] . "'>";
        echo "<p>Price: " . $nft['price'] . " ETH</p>";
        echo "</div>";
        echo "</div>";
    }
    echo '</div>';
}
?>
</div>
</div>
<?php
    include('templates/parts/footer.php');
?>
    