<?php


require "Database.php";
class Admin extends Database
{

    public function adminLogin()
    {
        //Appel de la classe Database + methode PDO
        $db = $this->getPDO();

//si session connecter retourne la page d'accueil
        if (isset($_SESSION['connecter']) && $_SESSION['connecter'] === true) {
            header("Location:http://localhost/mongite");
        }

//1 verifiée les champ du formulaire de connexion = ici email
        if (isset($_POST['email_client']) && !empty($_POST['email_client'])) {
            $email = htmlspecialchars(strip_tags($_POST['email_client']));
        } else {
            echo "<p class='alert-danger p-3'>Merci de remplir le champ email</p>";
        }

//1 verifiée les champ du formulaire de connexion = ici mot de passe
        if (isset($_POST['password_client']) && !empty($_POST['password_client'])) {
            $password = htmlspecialchars(strip_tags($_POST['password_client']));
        } else {
            echo "<p class='alert-danger p-3'>Merci de remplir le champ mot de passe</p>";
        }
//Verfifié que les champs champs ne sont pas vides et ecrire une requète SQL
        if (!empty($_POST['email_client']) && !empty($_POST['password_client'])) {
            //Requète de selection filtré a mail et mot passe
            $sql = "SELECT * FROM clients  WHERE email_client = ? AND password_client = ?";
            //Requete préparée
            $stmt = $db->prepare($sql);
            //Passage des parapmètre bind lié les données du formulaire au paramètres de la requètes SQL
            $stmt->bindParam(1, $_POST['email_client']);
            $stmt->bindParam(2, $_POST['password_client']);
            //execution de la requète
            $stmt->execute();

            //Compte les elements = si il y a une entrée (un administrateur dans la table)
            if ($stmt->rowCount() >= 1) {
                //variable $row stock les recultat de recheche (fetch)
                if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    //recup de id
                    $id = $row['id_client'];
                    //recup de email
                    $email = $row['email_client'];
                    //recup de mot de passe hashé
                    $hashed_password = $row['password_client'];
                    //Vérifie que le hachage fourni correspond bien au mot de passe fourni.

                        echo "Erreur de connexion";
                        //Si email entré = email dans la table et mot de passe entré = mot de passe de la table sont egale
                        if ($_POST['email_client'] == $row['email_client'] && $_POST['password_client'] == $row['password_client']) {
                            //On demarre une seesion administrateur

                            //Ici un booléen a utilisé dans chaque page admin
                            $_SESSION['connecter'] = true;
                            $_SESSION['id_admin'] = $id;
                            $_SESSION['email_client'] = $email;
                            //On stock tous dans la variable super globale $_SESSION et on fait une redirection vers la page d'aacueil

                        } else {
                            //Sinon on affiche diverses erreurs
                            echo "erreur de connexion merci de vérifié votre email et mot de passe";
                        }

                } else {
                    echo "aucun element trouver";
                }
            } else {
                echo "<p class='alert-danger p-3'>Erreur de connexion, merci de verifier votre email et mot de passe</p>";
            }

        }
    }

}