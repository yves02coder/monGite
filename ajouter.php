<?php
require "header.php";
require 'database.php';

$data=new database();
?>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nom du gite</th>
            <th scope="col">image du gite</th>
            <th scope="col">description du gite</th>
            <th scope="col">prix du gite</th>
            <th scope="col">localisation</th>
            <th scope="col">nombre de chambre</th>
            <th scope="col">numero de gite</th>


        </tr>
        </thead>

        <div class="form-group">
            <tbody>
            <form action="#" method="post" enctype="multipart/form-data">
                <tr>
                    <th scope="row"></th>
                    <td><label for="nom_mongite">nom du gite:</label>
                        <input id="nom_mongite" name="nom_mongite" class="form-control" type="text" required></td>

                    <td><label for="image_mongite">image du gite:</label>
                        <input id="image_mongite" name="image_mongite" type="file" class="form-control" accept="image/gif" ></td>

                    <td><label for="chambre_mongite">chambre:</label>
                        <input name="chambre_mongite" id="chambre_mongite" type="number" class="form-control" required></td>

                    <td><label for="geoloc_mongite">localisation du gite:</label>
                        <input type="text" id="geoloc_mongite" name="geoloc_mongite" class="form-control" required></td>

                    <td><label for="prix_mongite">prix:</label>

                        <input name="prix_mongite" id="prix_mongite" type="number" class="form-control" required></td>

                    <td><label for="dispo_mongite">disponibilité:</label>
                        <input type="text" id="dispo_mongite" name="dispo_mongite" class="form-control" required></td>

                    <td><label for="description_mongite">description:</label>
                        <textarea type="text" id="description_mongite" name="description_mongite" class="form-control" required></textarea></td>


                    <td><label for="date_arrivee">date d'arrivée:</label>
                        <input type="date" id="date_arrivee" name="date_arrivee" class="form-control" required></td>

                    <td><label for="date_depart">date de depart:</label>
                        <input type="date" id="date_depart" name="date_depart" class="form-control" required></td>

                    <td><label for="personne">personne:</label>
                        <input type="number" id="personne" name="personne" class="form-control" required></td>
                    <td><label for="mongite_id">type gite</label>
                        <div class="form-check">
                            <input value="1" class="form-check-input" type="radio" name="categorie_id" id="flexRadioDefault1">
                            <label value="1" class="form-check-label" for="flexRadioDefault1">
                               chalet
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="2" class="form-check-input" type="radio" name="categorie_id" id="flexRadioDefault2" checked>
                            <label value="2" class="form-check-label" for="flexRadioDefault2">
                                villa
                            </label>
                        </div> <div class="form-check">
                            <input value="3" class="form-check-input" type="radio" name="categorie_id" id="flexRadioDefault2" checked>
                            <label value="3" class="form-check-label" for="flexRadioDefault2">
                               hotel
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="4" class="form-check-input" type="radio" name="categorie_id" id="flexRadioDefault2" checked>
                            <label value="4" class="form-check-label" for="flexRadioDefault2">
                                maison
                            </label>
                        </div>
                    </td>
                </tr>
                <div class="form-group">
                    <button type="submit" name="ajouter" class="btn btn-outline-success"data-target="nom_mongite"> ajouter</button>
                </div>
            </form>

            </tbody>

        </div>

    </table>
    <a href="index.php"  class="btn btn-info"> retour</a>
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




if (isset($_POST['ajouter'])){
    $data->getNew();
}
require "footer.php";



