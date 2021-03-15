<?php
/*session_start();

if (isset($_GET['url'])){
    $url=$_GET['url'];

}else{
    $url="index";
}
if (empty($url)){
    $url="index.php";
}

if (isset($_SESSION['connecter'])&& $_SESSION['connecter']===true){
    echo "<div class='text-center'>
<a href='index.php'>connexion</a>
</div>";
    $url='acceuil';
}else{
    echo "merci de votre visite";
}



if ($url==="read"){
    require 'read';

}elseif ($url==="incription"){
    require "inscription.php";
}elseif (!isset($url)&& empty($url)){
    require "ERREUR DE CONNEXION";
}elseif ($url==="mongite?page=1"){
    require "index.php";
}