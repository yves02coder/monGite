<?php
//session_start();
require 'Reservation.php';

$Reservation=new Reservation();
require "header.php";
$email_client = new Reservation();
if(isset($_SESSION['email_client']) && $_SESSION['password_client'] && $_SESSION['nom_client'] === true){
    if(isset($_POST['Reservation'])){
        $email_client=$this->reserver;
        echo "<h3 class='alert-success p-3 mt-3 text-danger'>Un email viens de vous etre envoyé, merci de verifié votre boite mail pour confirmer votre resevation</h3>";
    }else{
        echo "<p class='alert-warning p-3 mt-2'>Merci de remplir le formulaire avec votre email</p>";
    }

    ?>

    <div class="main-container">
        <h1 class="text-center text-info">RÉSERVATION</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="email_user">Merci d'entrer votre email</label>
                <input type="email" class="form-control" name="email_client" id="email_user" placeholder="Votre email@email.com">
            </div>
            <input type="submit" value="Reserver" name="Reservation" class="btn btn-outline-info"/>
        </form>
    </div>

    <?php
}else{
    echo "<p class='alert-warning p-5 m-5'>inscrivez vous pour beneficier de nos avantages !</p>";
    echo "<p><a href='login.php' class='btn btn-warning'>connexion</a></p>";
    echo "<p><a href='inscription.php' class='btn btn-primary'> incription</a></p>";
}
