
<?php
require "Database.php";
require "header.php";
$db=new database();

$db->getALLgite();
echo  $_SESSION['email_client'];




require "footer.php";
