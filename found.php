<?php
require 'Database.php';

$db=new database();
$db->getFound();
?>

<div class="p-5 text-center bg-image"
     style="
      background-image: url('https://mdbootstrap.com/img/new/slides/041.jpg');
      height: 480px;
       background-repeat: no-repeat;
      background-size: cover;">

        <div class="mask">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3" style="margin-top: 2%;font-size: 60px;" ><u>Bienvenue au Bougainvillier</u></h1></br>

                    <a class="btn btn-outline-danger btn-lg" href="login.php" role="button"><b>Connexion</b></a>

                </div>
            </div>
        </div>
</div>
