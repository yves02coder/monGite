<?php
require "header.php";
require 'Database.php';
$db=new database();
//$maj=$db;
$db->getDetail();
?>
<form method="post" action="" enctype="multipart/form-data">
    <div class="container">
        <div class="form-group">
            <label for="nom_mongite"><b>nom du gite</b></label>
            <input type="text" class="form-control" id="nom_mongite" name="nom_mongite"  placeholder="" value=""required>
        </div>

        <div class="form-group">
            <label for="image_mongite"><b> image</b></label>
            <input  type="file" class="form-control" id="image_mongite" name="image_mongite"
                    required placeholder=""
                    value="">
        </div>

        <div class="form-group">
            <label for="chambre_mongite"><b>nombre de chambre</b></label>
            <input type="text" class="form-control" id="chambre_mongite" name="chambre_mongite" required
                   placeholder="" value="">
        </div>


        <div class="form_group">
            <label for="geoloc_mongite"><b>localisation</b></label>
            <input type="text" class="form-control" id="geoloc_mongite" name="geoloc_mongite" required
                   placeholder="" value="">
        </div>
        <div class="form_group">
            <label for="prix_mongite"><b>Prix du gite</b></label>
            <input type="number" class="form-control" id="prix_mongite" name="prix_mongite" required
                   placeholder="" value="">
        </div>
        <div class="form_group">
            <label for="dispo_mongite"><b>disponibilité</b></label>
            <input type="text" class="form-control" id="dispo_mongite" name="dispo_mongite" required
                   placeholder="" value="">
        </div>
        <div class="form_group">
            <label for="description_mongite"><b>description</b></label>
            <textarea rows="5" type="text" class="form-control" id="description_mongite" name="description_mongite" required
                      placeholder="" value=""></textarea>
        </div>
        <div class="form_group">
            <label for="date_arrivee"><b>date d'arrivée</b></label>
            <input type="date" class="form-control" id="date_arrivee" name="date_arrivee" required
                   placeholder="" value="">
        </div>
        <div class="form_group">
            <label for="date_depart"><b>date du depart</b></label>
            <input type="date" class="form-control" id="date_depart" name="date_depart" required
                   placeholder="" value="">
        </div>
        <div class="form_group">
            <label for="personne"><b>nombre de personne</b></label>
            <input type="number" class="form-control" id="personne" name="personne" required
                   placeholder="" value="">


        </div>

        <div class="form_group">
            <button name="modifier" type="submit" class="btn btn-outline-success button">modifier le produit</button>
        </div>
    </div>
</form>
<?php

if (isset($_FILES['image_mongite'])){
    $dossier="image/";
    $image_mongite=$dossier.basename($_FILES['image_mongite'] ['name']);
    $_POST['image_mongite']=$image_mongite;
    if (move_uploaded_file($_FILES['image_mongite']['tmp_name'],$image_mongite)){
        echo"votre fichier est bien chargé";
    }else{
        echo"votre fichier n'est pas valide";
    }
}
if (isset($_POST['modifier'])){
    $db->getUpdate();
}
require "footer.php";






