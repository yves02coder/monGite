<?php
require "header.php";
require "Database.php";
$data=new database;
$data->ConnexionClient();



?>

<form method="post">
    <div class="container-fluid" style="background-color: royalblue;border: 1px solid black" id="connexion">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" value="email_client"><b class="text-black">email</b></label>
            <input  name="email_client" type="email" class="form-control" id="#exampleInputEmail">
           <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" value="password_client"><b class="text-black">Password</b></label>
            <input name="password_client" type="password" class="form-control" id="exampleInputPassword1" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" value="nom_client"><b class="text-black">Nom</b></label>
            <input name="nom_client" type="nom" class="form-control" id="exampleInputPassword1" >
        </div>
        <button name="connecter" type="submit" class="btn btn-success">connecter</button>
       <?php
if (isset($_POST['connecter'])){
    ?>

    <a href="index.php" class="btn btn-success"> Retour a  l'accueil</a>
    <?php
}
       ?>

    </div>
</form>

<!--<a href="logout.php">Deco</a>-->





<?php

require "footer.php";
