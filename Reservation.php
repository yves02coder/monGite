<?php


class Reservation
{


    private $reserver;

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

   /* public function getALLgite()
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



                                    <a href="booking.php?id_mongite=<?= $row['id_mongite'] ?>" name="booking"
                                       class="btn btn-primary">valider</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php

        }
    }


}
?>

<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="..." alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</div>
 */
}
