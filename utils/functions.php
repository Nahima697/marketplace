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

function getAllNft(){
    //Création de la requete Sql
    $pdo = connectDB();
    $request = $pdo->query('
    SELECT nft.*, user.name AS user_name,user.user_id AS user_id, nft_collection.name AS collection_name
    FROM nft
    INNER JOIN user ON nft.id_user = user.user_id
    INNER JOIN nft_collection ON nft_collection.id = nft.id_nft_collection 
  ');
    return $request->fetchAll();
}


function getNftById($nftId) {
    $pdo = connectDB();
    $stmt = $pdo->prepare('SELECT nft.*, user.name AS user_name, nft_collection.name AS collection_name 
    FROM nft 
    INNER JOIN user ON nft.id_user = user.user_id 
    INNER JOIN nft_collection ON nft.id_nft_collection = nft_collection.id 
    WHERE nft.id = :nftId');
    $stmt->bindParam(':nftId', $nftId);
    $stmt->execute();

    return $stmt->fetch();
}

function getNftsByUserId($userId) {
    $pdo = connectDB();
    $stmt = $pdo->prepare('SELECT nft.*, user.name AS user_name, nft_collection.name AS collection_name 
        FROM nft 
        INNER JOIN user ON nft.id_user = user.user_id 
        INNER JOIN nft_collection ON nft.id_nft_collection = nft_collection.id 
        WHERE nft.id_user = :userId');
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    return $stmt->fetchAll();
}


function countNftUser($userId) {
    $pdo = connectDB();
    $stmt = $pdo->prepare('SELECT COUNT(*) AS nft_count,user_id FROM nft 
    INNER JOIN user ON nft.id_user = user.user_id 
    WHERE nft.id_user= :userId');
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    
    $result = $stmt->fetch();
    $nftCount = $result['nft_count'];
    
    return $nftCount;
}


?>