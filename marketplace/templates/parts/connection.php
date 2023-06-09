<?php
include('header.php');
?>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] === "0") {
        echo "<p class='text-danger'>Identifiants incorrects</p>";
    } else {
        echo "<p class='text-danger'>Accès restreint</p>";
    }
} ?>

<div class="container">
<form class = "connexion" method = "post" action ="validationConnexion.php?login=true">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email </label>
    <input type="email" name ="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Cochez la case</label>
  </div>
  <div>
  <button type="submit" class="btn btn-primary">Connexion</button>
</form>

<a class="btn btn-primary inscription" >Inscription</a>
</div>
<form class="connexionFormulaire  disabled" action="validationUser.php" method="POST">
<div class="mb-3">
            <label for="first_name" class="form-label">Nom</label>
            <input  required name="first_name" type="text" class="form-control" id="nomUser">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Prénom</label>
            <input  required name="name" type="text" class="form-control" id="nomUser">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input  required name="password" type="password" class="form-control" id="passWordUser">
        </div>
        <div class="mb-3">
            <label for="emailUser" class="form-label">Adresse Email</label>
            <input required name="email" type="email" class="form-control" id="emailUser" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="birthYearUser" class="form-label">Date de naissance</label>
            <input required name="birthYearUser" type="date" class="form-control" id="birthYearUser" aria-describedby="emailHelp">
        </div>
    <button type="submit" class="btn btn-secondary">Valider mon inscription</button>
</form>
</div>
<?php 

include('footer.php'); ?>
