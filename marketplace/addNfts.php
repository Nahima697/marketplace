<?php 
include('utils/functions.php');

$pdo = connectDB();
session_start();
var_dump($_SESSION);
if (isset($_SESSION['userName'])) {
    $userName = $_SESSION['userName'];
    $userId = $_SESSION['userId'];
}
    
    
$collections = getAllCollections($pdo) ?>
<h5> Ajouter un nft</h5>
<form method="post" enctype="multipart/form-data">
    <br>
<label> Name</label>
<input type="text" name ="name">
<label>Image:</label>
<input type="file" name="image">
<br>
<label>Prix:</label>
<input type="number" name="price">
<br>
<label>Collection:</label>
<select name="collection">
    <option>Selectionner une collection</option>
    <?php 
    foreach ($collections as $collection) {
        ?>
        <option value="<?php echo $collection["id"] ?>"><?php echo $collection["name"] ?></option>
        <?php 
    }
    
    ?>
</select>
<br>
<input type="submit" value="valider">
</form>

 <?php  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        if ($_FILES['image']['size'] <= 1000000) {
            $infosfichier = pathinfo($_FILES['image']['name']);
            $extension_upload = strtolower($infosfichier['extension']);
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            
            if (in_array($extension_upload, $extensions_autorisees)) {
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . basename($_FILES['image']['name']));
                echo "L'envoi a bien été effectué !";
            } else {
                echo "J'accepte uniquement les images de type JPG, JPEG, GIF et PNG.";
            }
        } else {
            echo "Le fichier est trop lourd.";
        }
    } else {
        echo "Une erreur s'est produite lors de l'envoi du fichier.";
    }
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $price = $_POST['price'];
    $collection = $_POST['collection'];
    $userId =  $_SESSION['userId'];

    addNft($name,$userId,$collection,$image, $price );
  
    header("Location: templates/parts/userprivateprofil.php?id=$userId");
    exit(); 
}
