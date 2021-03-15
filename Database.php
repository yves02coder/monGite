<?php


class database
{



    public function getPDO()
    {
        $user = "root";
        $pass = "";
        try {
            $db = new PDO("mysql:host=localhost;dbname=mongite;charset=utf8", $user, $pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $exception) {
            echo "erreur de connexion:" . $exception->getMessage();
        }
    }


//voir tout admin

    public function getALLgite()
    {
        $db = $this->getPDO();
        $sql = $db->query("SELECT * FROM gites INNER JOIN  categories ON gites.categorie_id=categories.id_categorie");
        ?>

        <?php
        foreach ($sql as $row) {

            ?>

            <div class="text-center">
                <div class="container mt-5">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card ">
                                <img src="<?= $row['image_mongite'] ?>" class="card-img-top">
                                <div class="card-body">
                                    <u class="text-primary">nom:</u><h5 class="card-title">
                                        <u><?= $row['nom_mongite'] ?></u></h5>
                                    <u class="text-primary">description:</u><tt><p
                                                class="card-text"><?= $row['description_mongite'] ?></tt>
                                    </p>
                                    <u class="text-primary">nombre de chambre:</u>
                                    <p class="card-text"><?= $row['chambre_mongite'] ?></p>
                                    <u class="text-primary">type du gite:</u>
                                    <p class="card-text"><?= $row['nom_categorie'] ?></p>


                                    <a href="detail.php?id_mongite=<?= $row['id_mongite'] ?>" name="detail"
                                       class="btn btn-primary">detail</a>
                                    <a href="supprimer.php?id_mongite=<?= $row['id_mongite'] ?>" name="detail"
                                       class="btn btn-primary">supprimer</a>
                                    <a href="modifier.php?id_mongite=<?= $row['id_mongite'] ?>" name="update"
                                       class="btn btn-primary">modifier</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php

        }
    }

    public function getDetail()
    {

        $db = $this->getPDO();

        $sql = $db->prepare('SELECT * FROM gites INNER JOIN  categories ON gites.categorie_id=categories.id_categorie WHERE id_mongite=?');
        //$id=(isset($_GET['id_mongite'])? $_GET['id_mongite']: ' ');
        $id_mongite = $_GET['id_mongite'];
        $sql->bindParam(1, $id_mongite);
        $sql->execute();
        $req = $sql->fetch();

        ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <div class="text-center mt-2">
            <a href="index.php" class="btn btn-info">retour</a>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card ">
                        <img src="<?= $req['image_mongite'] ?>" class="card-img-top" alt="...">
                        <br class="card-body">
                        <u class="text-primary">nom:</u><h5 class="card-title"><u><?= $req['nom_mongite'] ?></u></h5>
                        <u class="text-primary">description:</u><tt><p
                                    class="card-text"><?= $req['description_mongite'] ?></tt>
                        </p>
                        <u class="text-primary">type de gite:</u><tt style="font-size: 20px"><p
                                    class="card-text text-warning"><?= $req['nom_categorie'] ?></tt>
                        </p>
                        <u class="text-primary">nombre de chambre:</u>
                        <p class="card-text"><?= $req['chambre_mongite'] ?></p>
                        <u class="text-primary">prix:</u>
                        <p class="card-text"><?= $req['pix_mongite'] ?>€</p>
                        <u class="text-primary">type de gite:</u>
                        <p class="card-text"><?= $req['nom_categorie'] ?></p>
                        <?php
                        $dispo_mongite = $req['dispo_mongite'];
                        if ($dispo_mongite == false) {
                            echo $dispo_mongite = "NON";
                        } else {
                            echo $dispo_mongite = "OUI";
                        }
                        ?>
                        <u class="text-primary">disponibilité:</u>
                        <p class="card-text text-danger"><?= ($req['dispo_mongite']) ?></br></p>
                        <?php
                        $date_arrivee = new DateTime($req['date_arrivee']);
                        $date_depart = new DateTime($req['date_depart']);
                        ?>
                        <a href="booking.php.php?id_mongite=<?= $req['id_mongite'] ?>" name="detail" class="btn btn-primary">reserver votre gite</a>


                    </div>
                </div>
            </div>

        </div>


        <?php

    }


    public
    function getFound()
    {
        $db = $this->getPDO();


       // $sql = $db->prepare('SELECT * FROM gites INNER JOIN  categories ON gites.categorie_id=categories.id_categorie WHERE id_mongite=?');

        if(isset($_POST['date_arrivee'])){
            $date_arrivee = $_POST['date_arrivee'];
        }
        if(isset($_POST['date_depart'])){

            $date_depart = $_POST['date_depart'];
        }

        if(isset($_POST['chambre_mongite'])){
            $chambre_mongite = $_POST['chambre_mongite'];
        }

        $resultat=$db->query("SELECT * FROM gites WHERE date_depart < '".$date_arrivee."' AND chambre_mongite = '".$chambre_mongite."'");

        $date_arrivee = $_POST['date_arrivee'];
        $date_depart= $_POST['date_depart'];
        ?>

        <div class="row">
            <?php
            foreach ($resultat as $row){
                if($resultat->rowCount() > 0){
                    ?>
                    <div class="col-4 mt-3">
                        <div class="card" style="width: 22rem;">
                            <img  src="<?= $row['image_mongite'] ?>" class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-info"><?= $row['nom_mongite'] ?></h5>
                                <p class="card-text"><b>Description : </b></p>
                                <p><?= $row['description_mongite'] ?></p>
                                <p><b>Nombre de chambre : </b><b class="text-danger"><?= $row['chambre_mongite'] ?></b></p>
                                <p><b>Zone géographique : </b><b class="text-info"><?= $row['geoloc_mongite'] ?></b></p>
                                <p><b>Prix: </b><b class="text-success"><?= $row['prix_mongite'] ?> €</b></p>

                                <?php
                                $dispo_mongite = $row['dispo_mongite'];
                                if($dispo_mongite == false){
                                    $dispo_mongite =  "NON";
                                }else{
                                    $dispo_mongite= "OUI";
                                }
                                ?>

                                <p><b>Disponible : </b><b class="text-warning"><?= dispo_mongite ?></b></p>
                                <?php
                                $date_a = new DateTime($row['date_arrivee']);
                                $date_d = new DateTime($row['date_depart']);
                                ?>
                                <p><b>Date d'arrivée : </b> </p>
                                <p class="alert-success p-2"><?=  $date_arrivee->format('d-m-Y')?></p>

                                <p><b>Date de depart : </b></p>
                                <p class="alert-info p-2"> <?=  $date_depart->format('d-m-Y')?></p>
                                <a href="index.php?url=details_mongite.php&id=<?= $row['id_mongite'] ?>" class="btn btn-outline-info">Plus d'infos</a>
                            </div>
                        </div>
                    </div>

                    <?php

                }else{
                    echo "<p class='alert-danger p-2'>Aucune offre ne correspond à vos critères de recherche</p>";
                }
            }
            ?>
        </div>
        <?php

    }


    public function getNew()
    {
        $db = $this->getPDO();
        if (isset($_POST['nom_mongite']) && !empty($_POST['nom_mongite'])) {
            $nom_mongite = htmlspecialchars(strip_tags($_POST['nom_mongite']));
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['image_mongite']) && !empty($_POST['image_mongite'])) {
            $image_mongite = $_POST['image_mongite'];
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['chambre_mongite']) && !empty($_POST['chambre_mongite'])) {
            $chambre_mongite = $_POST['chambre_mongite'];
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['geoloc_mongite']) && !empty($_POST['geoloc_mongite'])) {
            $geoloc_mongite = htmlspecialchars(strip_tags($_POST['geoloc_mongite']));
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['prix_mongite']) && !empty($_POST['prix_mongite'])) {
            $prix_mongite = $_POST['prix_mongite'];
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['dispo_mongite']) && !empty($_POST['dispo_mongite'])) {
            $dispo_mongite = $_POST['dispo_mongite'];
        } else {
            echo "veuillez remplir tout les champs";
        }


        if (isset($_POST['description_mongite']) && !empty($_POST['description_mongite'])) {
            $description_mongite = htmlspecialchars(strip_tags($_POST['description_mongite']));
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['date_arrivee']) && !empty($_POST['date_arrivee'])) {
            $date_arrivee = $_POST['date_arrivee'];
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['date_depart']) && !empty($_POST['date_depart'])) {
            $date_depart = $_POST['date_depart'];
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['personne']) && !empty($_POST['personne'])) {
            $personne = $_POST['personne'];
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['categorie_id']) && !empty($_POST['categorie_id'])) {
            $categorie_id = $_POST['categorie_id'];
        } else {
            echo "veuillez remplir tout les champs";
        }


        $sql = "INSERT INTO gites(nom_mongite,image_mongite,chambre_mongite,geoloc_mongite,pix_mongite,dispo_mongite,description_mongite,date_arrivee,date_depart,personne,categorie_id) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $ajouter = $db->prepare($sql);
        //binder(lier) des elements
        $ajouter->bindParam(1, $nom_mongite);
        $ajouter->bindParam(2, $image_mongite);

        $ajouter->bindParam(3, $chambre_mongite);

        $ajouter->bindParam(4, $geoloc_mongite);
        $ajouter->bindParam(5, $prix_mongite);
        $ajouter->bindParam(6, $dispo_mongite);
        $ajouter->bindParam(7, $description_mongite);
        $ajouter->bindParam(8, $date_arrivee);
        $ajouter->bindParam(9, $date_depart);
        $ajouter->bindParam(10, $personne);
        $ajouter->bindParam(11, $categorie_id);
        $resultat = $ajouter->execute(array($nom_mongite, $image_mongite, $chambre_mongite, $geoloc_mongite, $prix_mongite, $dispo_mongite, $description_mongite, $date_arrivee, $date_depart, $personne, $categorie_id));
        if ($resultat) {
            var_dump($ajouter);
            echo "votre produit est ajouté";
            echo "<a href='index.php' class='btn btn-danger'>retour a la liste</a>";
        } else {
            echo "<p class='text-danger'>merci de remplir tout les champs</p>";
        }

        ?>


        <?php
    }


    //login

    public function getLogin()
    {
//session_start();
$db=$this->getPDO();
        $email_client="";
        $password_client="";
        $nom_client="";

if ($email_client!=="" && $password_client!=="" && $nom_client!==""){
    $sql = $db->prepare("SELECT count(*) FROM clients WHERE email_client ='".$email_client."' AND password_client ='".$password_client."' AND nom_client='".$nom_client."'");
    $sql->fetch();
    $count=$sql['count(*)'];
    if ($count!=1){
        $_SESSION['nom_client']=$nom_client;
        header("location:read.php");
    }else{
        header("location:login.php");

    }

}

                }



    public function getUpdate()
    {

        $db = $this->getPDO();
        if (isset($_POST['nom_mongite']) && !empty($_POST['nom_mongite'])) {
            $nom_mongite = htmlspecialchars(strip_tags($_POST['nom_mongite']));
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['image_mongite']) && !empty($_POST['image_mongite'])) {
            $image_mongite = $_POST['image_mongite'];
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['chambre_mongite']) && !empty($_POST['chambre_mongite'])) {
            $chambre_mongite = $_POST['chambre_mongite'];
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['geoloc_mongite']) && !empty($_POST['geoloc_mongite'])) {
            $geoloc_mongite = htmlspecialchars(strip_tags($_POST['geoloc_mongite']));
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['prix_mongite']) && !empty($_POST['prix_mongite'])) {
            $prix_mongite = $_POST['prix_mongite'];
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['dispo_mongite']) && !empty($_POST['dispo_mongite'])) {
            $dispo_mongite = $_POST['dispo_mongite'];
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['description_mongite']) && !empty($_POST['description_mongite'])) {
            $description_mongite = htmlspecialchars(strip_tags($_POST['description_mongite']));
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['date_arrivee']) && !empty($_POST['date_arrivee'])) {
            $date_arrivee = $_POST['date_arrivee'];
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['date_depart']) && !empty($_POST['date_depart'])) {
            $date_depart = $_POST['date_depart'];
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['personne']) && !empty($_POST['personne'])) {
            $personne = $_POST['personne'];
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['mongite_id']) && !empty($_POST['mongite_id'])) {
            $mongite_id = $_POST['mongite_id'];
        } else {
            echo "veuillez remplir tout les champs";
        }


        $id_mongite = $_GET['id_mongite'];
        $sql = "UPDATE gites SET nom_mongite=?,image_mongite=?,chambre_mongite=?,geoloc_mongite=?,pix_mongite=?,dispo_mongite=?,description_mongite=?,date_arrivee=?,date_depart=?,personne=? WHERE id_mongite=?";
        $maj = $db->prepare($sql);
        $maj->bindParam(1, $nom_mongite);
        $maj->bindParam(2, $image_mongite);

        $maj->bindParam(3, $chambre_mongite);

        $maj->bindParam(4, $geoloc_mongite);
        $maj->bindParam(5, $prix_mongite);
        $maj->bindParam(6, $dispo_mongite);
        $maj->bindParam(7, $description_mongite);
        $maj->bindParam(8, $date_arrivee);
        $maj->bindParam(9, $date_depart);
        $maj->bindParam(10, $personne);
        $maj->bindParam(11, $id_mongite);


        $update = $maj->execute(array($nom_mongite, $image_mongite, $chambre_mongite, $geoloc_mongite, $prix_mongite, $dispo_mongite, $description_mongite, $date_arrivee, $date_depart, $personne, $id_mongite));
        if ($update) {


            echo "votre produit a ete modifié";
            echo "<a href='index.php' class='btn btn-danger'>retour a la liste</a>";
        } else {
            echo "<p class='text-danger'>merci de remplir tout les champs</p>";
        }


    }

    public function getDelete()
    {
        $db = $this->getPDO();

        $sql = 'DELETE FROM gites  WHERE id_mongite=?';
        $supprimer = $db->prepare($sql);
//$id=(isset($_GET['id_mongite'])? $_GET['id_mongite']: ' ');

        $supprimer->bindParam(1, $id_mongite);
        $id_mongite = $_GET['id_mongite'];
        $supprimer->execute();


        if ($supprimer) {
            echo "<p class='text-danger'>le gite a ete supprimé</p>";
        } else {
            echo "une reeur c'est produite";
        }

        if (isset($_POST['supprimer'])) {
            echo "vous voulez supprimer";
        }

    }

    public function getNewclient()
    {
        $db = $this->getPDO();
        if (isset($_POST['email_client']) && !empty($_POST['email_client'])) {
            $email_client = htmlspecialchars(strip_tags($_POST['email_client']));
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['password_client']) && !empty($_POST['password_client'])) {
            $password_client = htmlspecialchars(strip_tags($_POST['password_client']));
        } else {
            echo "veuillez remplir tout les champs";
        }
        if (isset($_POST['nom_client']) && !empty($_POST['nom_client'])) {
            $nom_client = htmlspecialchars(strip_tags($_POST['nom_client']));
        } else {
            echo "veuillez remplir tout les champs";
        }
        if ($_POST['password_client'] != $_POST['repeatpassword']) {
            echo "<p>le mot de passe est different veuillez recommencer</p>";
        }
        $sql = "INSERT INTO clients(email_client,password_client,nom_client) VALUES (?,?,?)";
        $add = $db->prepare($sql);
        $add->bindParam(1, $email_client);
        $add->bindParam(2, $password_client);
        $add->bindParam(3, $nom_client);
        $resultat = $add->execute(array($email_client, $password_client, $nom_client));
        if ($resultat) {
            var_dump($resultat);
            echo "<p> votre inscription a bien été enregistrée</p>";
            echo "<a href='login.php' class='btn btn-danger'>connexion</a>";

        } else {
            echo "une erreur c'est produite veuillez recommencer ulterieurement";
        }
    }

    public function getRead()
    {
        $db = $this->getPDO();


        $sql = $db->query("SELECT * FROM gites INNER JOIN  categories ON gites.categorie_id=categories.id_categorie");

        ?>

        <?php
        foreach ($sql as $row) {


            ?>

            <div class="text-center">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card ">
                                <img src="<?= $row['image_mongite'] ?>" class="card-img-top" alt="...">
                                <b class="card-body">
                                    <u class="text-primary" style="font-size: 20px">nom:</u><h5 class="card-title"><u
                                                style="font-size: 20px"><b><?= $row['nom_mongite'] ?></b></u></h5>
                                    <u class="text-primary" style="font-size: 20px">description:</u><tt><p
                                                class="card-text"
                                                style="font-size: 20px"><?= $row['description_mongite'] ?></tt>
                                    </p>
                                    <p><u class="text-primary"><b style="font-size: 20px" class="card-text text-danger">nombre
                                                de chambre:</u> <?= $row['chambre_mongite'] ?></b></p>
                                <u class="text-primary"><b style="font-size: 20px">type de gite:</b></u><b
                                        class="card-text text-warning"
                                        style="font-size: 20px">   <?= $row['nom_categorie'] ?></b>


                            </div>
                        </div>
                    </div>
                    <a href="booking.php?id_mongite=<?= $row['id_mongite'] ?>" name="detail" class="btn btn-success">reservation</a>
                </div>

                </form>
            </div>
            <?php
        }
    }

    public function getconnexion()
    {
        $db=$this->getPDO();
        $sql=$db->query("SELECT * FROM clients ");
        $email_client=$_POST['email_client'];
        $password_client=$_POST['password_client'];
        $connecter=$_POST['connecter'];

        if (isset($_POST['email_client']) AND !empty($_POST['email_client'])){
            $email_client=$_POST['email_client'];
        }else{
            echo "veuillez remplir le champ email";
        }


        if (isset($_POST['password_client'])AND !empty($_POST['password_client'])){
            $password_client=$_POST['password_client'];
        }else{
            echo "veuillez remplir le champ password";
        }
        if ($connect=$rowCount=1){
            $connect = $db->prepare("SELECT * FROM clients WHERE email_client = ? AND password_client = ? AND nom_client=?");
            $connect->bindParam(1, $_POST['email_client']);
            $connect->bindParam(2, $_POST['password_client']);
            $connect->bindParam(3, $_POST['nom_client']);
            $_SESSION['connecter']=true;
            $_SESSION['email_client'] = $_POST['email_client'];
            $_SESSION['password_client']=$_POST['password_client'];
            $_SESSION['nom_client'] = $_POST['nom_client'];
        }else{
            echo "le mot de passe ou l'email est incorrect";
        }
        if (isset($connect)) {
            if (!empty($email_client) and $_POST['email_client'] AND $_POST['nom_client']= true) {
               // header("location:http://localhost/mongite/read.php");
            } else {
                echo "erreur";
            }



        }
    }


    public function  userLogin(){

        //Connexion a la base de données a l'aide de l'instance de la classe mere (database)
        //Et appel de sa methode puyblic getPDO()

        $db = $this->getPDO();

        //Verifie si admin est deja connexté

        if(isset($_SESSION['connecter_user']) && $_SESSION['connecter_user'] === true){
            ?>
            <h1>Bonjour <?= $_POST['email_user'] ?></h1>
            <?php
        }else{
            echo "<p class='alert-warning mt-2 p-2'>Vous n'ètes âs encore inscrit sur notre site
                    <a href='inscription' class='btn btn-info'>S'incrire</a>
                </p>";
        }

        //Verification des champ du formulaire

        if(isset($_POST['email_user']) && !empty($_POST['email_user'])){
            $this->email_user = htmlspecialchars(strip_tags($_POST['email_user']));
        }else{
            echo "<p class='alert-danger p-3'>Merci remplir le champ Email</p>";
        }

        if(isset($_POST['$password_user']) && !empty($_POST['$password_user'])){
            $this->password_user = htmlspecialchars(strip_tags($_POST['$password_user']));
        }else{
            echo "<p class='alert-danger p-3'>Merci remplir le champ Email</p>";
        }

        if(!empty($_POST['email_user']) && !empty($_POST['password_user'])){
            //Requète de connexion
            $sql = "SELECT * FROM users WHERE email = ? AND password = ?";

            //Requète préparée
            $stmt = $db->prepare($sql);

            //Bind des paramètre

            $stmt->bindParam(1, $_POST['email_user']);
            $stmt->bindParam(2, $_POST['password_user']);
            //Attention ici 2 paramètres a liés
            $stmt->execute();

            if($stmt->rowCount() >= 1){
                //CReer une variavle qui liste (recherche) tous les element
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $id = $row['id']; //id de la table users de phpmyadmin
                //Recup de email
                $_POST['email_user'] = $row['email_user'];
                $_POST['password_user'] = $row['password_user'];


                if($_POST['email_client'] == $row['email_client'] && $_POST['password_client'] == $row['password_client'] && $_POST['nom_client'] == $row['nom_client']){
                    //Demarre la seesion
                    session_start();
                    //Booléen pour verifié si on est connecté
                    $_SESSION['connecter_client'] = true;
                    $_SESSION['id_client'] = $id;
                    $_SESSION['email_client'] = $this->email_client;
                    //La redirection
                    echo "<h2 class='alert-success p-2'>Bienvenue" .$_SESSION['email_client']. "</h2>";
                }else{
                    echo "<p class='alert-danger p-2'>erreur email et mot passe ne sont pas correct !</p>";
                }
            }else{
                echo "<p class='alert-danger mt-3 p-2'>Erreur de connexion, merci de verifié votre email et mote de passe</p>";
            }
        }else{
            echo "<p class='alert-danger p-2'>Merci de remplir tous les champs</p>";
        }



    }


    /*public function RegisterClient(){
        $db = $this->getPDO();
        $email_client=$_POST['email_client'];
        $password_client=$_POST['password_client'];
        $nom_client=$_POST['nom_client'];

        //Vérification des champs du formulaire

        if(isset($_POST['nom_client'])){
            $this->nom_client = $_POST['nom_client'];
        }else{
            echo "<p class='alert-danger p-2'>Merci de renter votre nom d'utilisateur</p>";
        }

        if(isset($_POST['email_client'])){
            $this->email_client = $_POST['email_client'];
        }else{
            echo "<p class='alert-danger p-2'>Merci de renter votre email d'utilisateur</p>";
        }

        if(isset($_POST['password_client'])){
            $this->password_client = $_POST['password_client'];
        }else{
            echo "<p class='alert-danger p-2'>Merci de renter votre mot de passe d'utilisateur</p>";
        }

        $sql = "INSERT INTO clients (email_client, password_client, nom_client) VALUES (?,?,?)";

        $add_client = $db->prepare($sql);

        $add_client->bindParam(1, $_POST['email_client']);
        $add_client->bindParam(2, $_POST['password_client']);
        $add_client->bindParam(3, $_POST['nom_client']);

        $add_client->execute(array($email_client, $password_client, $nom_client));

        if($add_client){
            header("Location: http://localhost/mongites/index.php");
        }else{
            echo "<p class='alert-danger p-2'>Une erreur est survenue, merci de verifié et de remplir tous les champs !</p>";
        }



    }
    */
    public function ConnexionClient(){

        $db = $this->getPDO();

        //Verifie si admin est deja connexté

        if(isset($_SESSION['connecter_client']) && $_SESSION['connecter_client'] === true){
            ?>
            <h1>Bonjour <?= $_SESSION['email_client'] ?></h1>
            <?php
        }else{
            echo "<p class='alert-warning mt-2 p-2'>Inscrivez vous vite
                    <a href='inscription.php' class='btn btn-info'>S'incrire</a>
                </p>";
        }

        //Verification des champ du formulaire

        if(isset($_POST['email_client']) && !empty($_POST['email_client'])){
            $this->email_client = htmlspecialchars(strip_tags($_POST['email_client']));
        }else{
            echo "<p class='alert-danger p-3'>Merci remplir le champ Email</p>";
        }

        if(isset($_POST['password_client']) && !empty($_POST['password_client'])){
            $this->password_client = htmlspecialchars(strip_tags($_POST['password_client']));
        }else{
            echo "<p class='alert-danger p-3'>Merci remplir le champ mot de passe</p>";
        }

        if(!empty($_POST['email_client']) && !empty($_POST['password_client'])&& !empty(['nom_client'])){
            //Requète de connexion
            $sql = "SELECT * FROM clients WHERE email_client = ? AND password_client = ? AND nom_client=?";

            //Requète préparée
            $stmt = $db->prepare($sql);

            //Bind des paramètre

            $stmt->bindParam(1, $_POST['email_client']);
            $stmt->bindParam(2, $_POST['password_client']);
            $stmt->bindParam(3, $_POST['nom_client']);
            //Attention ici 2 paramètres a liés
            $stmt->execute();

            if($stmt->rowCount() >= 1){
                //CReer une variavle qui liste (recherche) tous les element
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $id_client = $row['id_client']; //id de la table users de phpmyadmin
                //Recup de email
                $_POST['email_client'] = $row['email_client'];
                $_POST['password_client'] = $row['password_client'];


                if($_POST['email_client'] == $row['email_client'] && $_POST['password_client'] == $row['password_client']){
                    //Demarre la seesion//Booléen pour verifié si on est connecté
                    session_start();
                    $_SESSION['connecter_client'] = true;

                    $_SESSION['id_client'] = $id_client;
                    $_SESSION['email_client'] =$_POST['email_client'];
                    $_SESSION['nom_client']=$_POST['nom_client'];
                    //header('Location: http://localhost/mongite/inscription.php');
                    //La redirection
                    echo "<h2 class='alert-success p-2'>Bienvenue" .' '.$_SESSION['nom_client']. "</h2>";


                }else{
                    echo "<p class='alert-danger p-2'>erreur email et mot passe ne sont pas correct !</p>";
                }
            }else{
                echo "<p class='alert-danger mt-3 p-2'>Erreur de connexion, merci de verifié votre email et mote de passe</p>";
            }
        }else{
            echo "<p class='alert-danger p-2'>Merci de remplir tous les champs</p>";
        }


    }


}

$content = ob_get_clean();
