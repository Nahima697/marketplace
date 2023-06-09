<?php

function connectDB(){
        $host = 'localhost';
        $dbName = 'marketplace';
        $user = 'root';
        $password = '';

        return new PDO(
        'mysql:host='.$host.';dbname='.$dbName.';charset=utf8',
        $user,
        $password);
}

function configPDO($pdo){
// Cette ligne demandera à pdo de renvoyer les erreurs SQL si il y en a
    $pdo->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);

// Ne recuperer que les indices assoc
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
    PDO::FETCH_ASSOC);

}

function getAllNft($pdo){
  
    $request = $pdo->query('
    SELECT nft.*, user.name AS user_name,user.user_id AS user_id, nft_collection.name AS collection_name
    FROM nft
    INNER JOIN user ON nft.id_user = user.user_id
    INNER JOIN nft_collection ON nft_collection.id = nft.id_nft_collection 
  ');
    return $request->fetchAll();
}


function getNftById($pdo,$nftId) {

    $stmt = $pdo->prepare('SELECT nft.*, user.name AS user_name, nft_collection.name AS collection_name 
    FROM nft 
    INNER JOIN user ON nft.id_user = user.user_id 
    INNER JOIN nft_collection ON nft.id_nft_collection = nft_collection.id 
    WHERE nft.id = :nftId');
    $stmt->bindParam(':nftId', $nftId);
    $stmt->execute();

    return $stmt->fetch();
}

function getNftsByUserId($pdo,$userId) {
   
    $stmt = $pdo->prepare('SELECT nft.*, user.name AS user_name, nft_collection.name AS collection_name 
        FROM nft 
        INNER JOIN user ON nft.id_user = user.user_id 
        INNER JOIN nft_collection ON nft.id_nft_collection = nft_collection.id 
        WHERE nft.id_user = :userId');
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    return $stmt->fetchAll();
}

function findByEmailAndPassword($pdo, $email, $password) {
    $stmt = $pdo->prepare('SELECT * FROM user WHERE email = :email AND password = :password');
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    return $stmt->fetch();
}


function countNftUser($pdo,$userId) {
   
    $stmt = $pdo->prepare('SELECT COUNT(*) AS nft_count,user_id FROM nft 
    INNER JOIN user ON nft.id_user = user.user_id 
    WHERE nft.id_user= :userId');
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    $result = $stmt->fetch();
    $nftCount = $result['nft_count'];
    return $nftCount;
}

function getNftsByCollectionId($pdo,$id) {
    $pdo = connectDB();
    $stmt = $pdo->prepare('SELECT nft.*, nft_collection.name AS collection_name ,nft.name AS nft_name
    FROM nft 
    INNER JOIN nft_collection ON nft.id_nft_collection = nft_collection.id 
    WHERE nft.id_nft_collection = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll();
}


function addNft($name,$userId,$collection, $image, $price ) {
    $pdo = connectDB();
    $stmt = $pdo->prepare('INSERT INTO nft (name, id_user,id_nft_collection,image, price) 
    VALUES (:name,:id_user,:id_nft_collection, :image, :price)');

    $stmt->execute([
        'name' => $name,
        'id_user' => $userId,
        'id_nft_collection' => $collection,
        'image' => $image,
        'price' =>  $price,
    
    ]);

}

    function removeNft($pdo,$id) {
    
        $stmt = $pdo->prepare('DELETE FROM nft WHERE id = :id'); ;
        $stmt->execute([
            'id'=> $id
        ]);

    }
    function updateUser($pdo, $email, $password, $user_id) {
        $stmt = $pdo->prepare('UPDATE user SET email = :email, password = :password WHERE user_id = :user_id'); 
        $stmt->execute([
            'email' => $email,
            'password' => $password,
            'user_id' => $user_id
        ]);
    }
    

function addUser($pdo) {
 
    $stmt = $pdo->prepare('INSERT INTO user (first_name, name, password, email)
    VALUES (:first_name, :name, :password, :email)');
    $stmt ->execute([
        'first_name'=> $_POST['first_name'],
        'name'=> $_POST['name'],
        'password' => $_POST['password'],
        'email'=> $_POST['email'],
    ]);

}

function getAllCollections($pdo){
   
    $request = $pdo->query('SELECT * FROM nft_collection');
    return $request->fetchAll();
}


?>

