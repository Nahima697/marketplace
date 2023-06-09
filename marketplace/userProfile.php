<?php include('utils/functions.php');
include ('templates/parts/header.php');
$pdo = connectDB();
?>

<div class="container">     
<div class="row d-flex justify-content-center">
            <?php
            
    if (isset($_GET["id"])) {
        $nftUserId = intval($_GET['id']);
        $userNfts = getNftsByUserId($pdo,$nftUserId);?>
        <?php foreach ($userNfts as $nftItem) {
            if ($nftItem['id'] != $nftUserId) { 
                ?>
                <div class="col-md-3">
                    <div class="card mb-3">
                        <a href="http://localhost/marketplace/templates/nft/nftDetail.php?id=<?php echo intval($nftItem['id']); ?>">
                            <img class="card-img-top" src="http://localhost/marketplace/uploads/<?php echo $nftItem['image']; ?>" alt="<?php echo $nft['name']; ?>">
                        </a>                           
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $nftItem['name']; ?></h5>
                            <h5 class='text-center'>Owner :<?php echo $nftItem["user_name"]; ?></h5> 
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }
    include('templates/parts/footer.php')
            ?>  
     </div>
     </div>   

