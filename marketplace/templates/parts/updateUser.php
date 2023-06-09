
<form method="post" action="updateUser.php">
  <div class="form-group text-center">
    <h5>Modifier vos identifiants</h5>
    <label for="email">Adresse e-mail :</label>
    <input type="email" id="email" name="email" >
  </div>
  <div class="form-group">
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" >
  </div>
  <input type="submit" value="Mettre à jour">
</form>

<?php include('../../utils/functions.php');
session_start ();
$pdo = connectDB();
$user_id = $_SESSION['userId'];
var_dump($user_id);
if (isset($_POST['email']) && isset($_POST['password'])) {
  var_dump($_POST['email']);
  if (isset($user_id)) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    updateUser($pdo, $email, $password,$user_id);
    echo "Votre profil a été mis à jour";
    header("Location: userprivateprofil.php?id=".$userId);
    exit();
  } else {
    header('Location: connection.php?error=0');
    exit();
  }
} else {
  header('Location: connection.php?error=1');
  exit();
}
?>