<?php
include('../nft/nftDetail.php');
session_start();
$pdo = connectDB();
if (isset($_SESSION['userId'])) {
    $userName = $_SESSION['userName'];
    $userId = $_SESSION['userId'];
    ?>
    <div class="container">
        <h2 class="text-center m-3 p-3">Bienvenue <?php echo $userName; ?></h2>
        <div class="d-flex justify-content-end">
            <a class="btn btn-secondary m-3 align-self-end" href="http://localhost/marketplace/addNfts.php?id=<?php echo $userId; ?>">Ajouter des NFTs</a>
        </div>
        <?php
        if (isset($userId)) {
            $nfts = getNftsByUserId($pdo, $userId);
            foreach ($nfts as $nft) {
                ?>
                <div class="row mb-3">
                    <div class="card d-flex col-md-12 text-center p-3 m-2 flex-row">
                        <div class="col-3">
                            <img class="card-img col-md-3 w-75" src="http://localhost/marketplace/uploads/<?php echo $nft['image']; ?>" alt="<?php echo $nft['name']; ?>">
                        </div>
                        <div class="col-md-6">
                            <h3><?php echo $nft['name']; ?></h3>
                            <p>Collection: <?php echo $nft['collection_name']; ?></p>
                            <p>Price: <?php echo $nft['price'] . " ETH"; ?></p>
                            <a class="btn btn-primary m-2" href="http://localhost/marketplace/templates/nft/nftDetail.php?id=<?php echo $nft['id']; ?>">Voir le Nft</a>
                        </div>
                        <div class="col-md-3 d-flex flex-column align-items-end">
                            <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-danger deletebtn m-2"><img src="http://localhost/marketplace/image/trash3.svg"></button>
                            <a class="btn updatebtn m-2 " href="http://localhost/marketplace/templates/nft/updateNft.php?id=<?php echo $nft['id']; ?>">Mis à jour</a>
                            <div id="id01" class="modal">
                                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                                <form class="modal-content" action="/action_page.php">
                                    <div class="container">
                                        <h3>Supprimer le NFT</h3>
                                        <p>Etes-vous sûr?</p>
                                        <div class="clearfix">
                                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn btn btn-secondary">Annuler</button>
                                            <button type="button" onclick="handleDeleteButtonClick(<?php echo $nft['id']; ?>)" class="deletebtn btn btn-danger">Supprimer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "Utilisateur introuvable.";
        }
    } else {
        echo "Utilisateur introuvable.";
    }
    ?>
</div>

<script>
    function handleDeleteButtonClick(nftId) {
        let deleteUrl = "http://localhost/marketplace/removeNfts.php?id=" + nftId;
        window.location.href = deleteUrl;
    }
</script>
