 <?php
//session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="Images" size="any" type="image/png">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="asset/gite.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Navbar -->
    <title>

    </title>
</head>
<body class="container-fluid">

<header>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarExample01"
                aria-controls="navbarExample01"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse d-flex" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link btn-outline-info" aria-current="page" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-outline-info" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-outline-success" href="ajouter.php" name="getNew">ajouter votre établissement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-outline-warning" href="login.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-outline-primary" href="inscription.php">s'inscrire</a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link btn-outline-danger" href="logout.php">Deconnexion</a>
                    </li>





                </ul>


            </div>

        </div>
    </nav>
    <!-- Navbar -->

    <!-- Background image -->
    <form action="found.php" method="post">
    <div
        class="p-5 text-center bg-image"
        style="
      background-image: url('https://mdbootstrap.com/img/new/slides/041.jpg');
      height: 480px;
       background-repeat: no-repeat;
      background-size: cover;"
    >

        <div class="mask">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3" style="margin-top: 2%;font-size: 60px;" ><u>Bienvenue au Bougainvillier</u></h1></br>
                    <a href="rechercher.php" name="rechercher" class="btn btn-success">rechercher</a>

                    <div id="roule">
                       <!-- <a class="btn btn-outline-light btn-lg" href="#" role="button"><b class="text-dark"><input type="email" name="email" value="email" ></b></a>-->
                        <a type="date" class="btn btn-outline-light btn-lg" href="found.php" role="button"><b class="text-dark"> <input type="date" name="date_arrivee date depart" value="date arrivée|depart"><b class="text-info">Arrivée|Départ</b> <input type="date" name="" value="date depart"></b></a>

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

        <!--  <a href="found.php" name="detail" class="btn btn-success mt-5">rechercher</a>-->
    </div>
    </form>
    <!-- Background image -->
</header>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<?php
