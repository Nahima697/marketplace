<?php
    include_once("functions.php");
    // Try permet de tester le code et dès qu'une erreur survient
    // Le code passe dans le Catch
    try {   
    $pdo = connectDB();       
    configPDO($pdo);   
    }
    // $e permet de recuperer l'erreur qui à déclencher le catch
    catch (Exception $e) {
    echo('Erreur connexion à la base de données : '.$e->getMessage()); 
    exit;
       }
?>
