<?php
session_start();
require '../../../private/conn_Webshop.php';

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$residence = $_POST["residence"];
$street = $_POST["street"];
$housenumber = $_POST["housenumber"];
$postalcode = $_POST["postalcode"];
$email = $_POST["email"];
$password = $_POST["password"];
$repeatpass = $_POST["rpassword"];
$hash = password_hash($password, PASSWORD_DEFAULT);

try{
    if ($password == $repeatpass && $residence != ""){
      echo 'YIPPIE';
    }
    else{
     echo'<script> alert("User info was not put in correctly!");window.location="../../Webshop/index.php?page=register"';
     header('Location: ../../Webshop/index.php?page=register');
    }
}
catch (PDOException $exception){
    echo $exception->getMessage();
}

?>