<?php

require 'Database.php';

$db=new database();
$db->getFound();
?>

<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="p-5 text-center bg-image"
     style="
      background-image: url('https://mdbootstrap.com/img/new/slides/041.jpg');
      height: 480px;
       background-repeat: no-repeat;
      background-size: cover;">
    <form method="post">
        <div class="mask">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3" style="margin-top: 2%;font-size: 60px;" ><u>Bienvenue au Bougainvillier</u></h1></br>
                    <div id="roule">
                         <a class="btn btn-outline-light btn-lg" href="#" role="button"><b class="text-dark"><input type="email" name="email" value="email" ></b></a>
                        <a type="date" class="btn btn-outline-light btn-lg" href="found.php" role="button"><b class="text-dark">
                                <input type="date" name="date_arrivee" value="date arrivée|depart"><b class="text-info">Arrivée|Départ</b>
                                <input type="date" name="date_depart" value="date depart"></b></a>

                        <a class="btn btn-outline-light btn-lg" href="#" role="button"><b class="text-dark">Personne</b>
                            <label class="font-bold " for="people-select" ></label>
                            <select   name="personne" id="personne" class="btn-outline-dark">
                                <option value="">--Nombres de personnes--</option>
                                <option value="1"> 1</option>
                                <option value="2" >2</option>
                                <option value="3">3</option>
                                <option value="4" >4</option>
                                <option value="5">5</option>
                                <option value="6" >6</option>
                            </select>

                        </a>
                    </div>

                </div>

            </div>

        </div>

    </form>
</div>-->
