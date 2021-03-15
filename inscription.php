<?php
require "database.php";
$db=new database();
$db->getPDO();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" >
<body style="background-image: url('https://swiss-image.ch/fileadmin/_processed_/csm_Swiss_Image_sts8595_788cf78097.jpg');background-repeat: no-repeat;background-size: cover;z-index: 0;">
<h1 class="text-center" style="color: lightgreen;font-size: 30px"><tt>Bienvenue! veuillez renseigner tout les champs.☺</tt></h1>
<form action="#" method="post">
<div class="container mt-5" style="border: 1px solid black" id="input">
    <div class="mb-3">
        <label for="exampleInputName" class="form-label" value="nom"><b class="text-black">NOM:</b></label>
        <input type="text" name="nom_client" class="form-control" id="#exampleInputName" aria-describedby="nameHelp" required>

    </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" value="email"><b class="text-black">email</b></label>
            <input type="email" name="email_client" class="form-control" id="#exampleInputEmail" aria-describedby="emailHelp" required>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
        </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" value="password"><b class="text-black">mot de passe</b></label>
        <input type="password" name="password_client" class="form-control" id="exampleInputPassword1" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" value="password"><b class="text-black">confirmer le mot de passe</b></label>
        <input type="password" name="repeatpassword" class="form-control" id="exampleInputPassword1" required>
    </div>
    <div class="text-center">
<button name="confirmer" class="btn btn-outline-info" type="submit" >confirmer</button>
    </div>
</form>

</body>
<?php
if (isset($_POST['confirmer'])){
    $db->getNewclient();
}