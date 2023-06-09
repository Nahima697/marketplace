<?php 
include('utils/functions.php');
$pdo = connectDB();
session_start();
if (isset($_SESSION['userName']) && $_GET['id']) {
    $userName = $_SESSION['userName'];
    $userId = $_SESSION['userId'];
    $nft =getNftById($pdo,$_GET['id']);
 
    if($nft['id_user']== $userId ){
        removeNft($pdo,$nft['id']);
        header("Location: templates/parts/userprivateprofil.php?id=$userId");
        exit();
    } else {
        echo "Utilisateur introuvable.";
    }
}
   
