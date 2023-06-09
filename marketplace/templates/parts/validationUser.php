<?php
include('../../utils/functions.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name= $_POST['first_name'];
    $name = $_POST['name'];
    $email= $_POST['email'];
    $password = $_POST['password'];
     addUser($first_name, $name, $email, $password);
     header('Location: index.php');
  
}
?>;