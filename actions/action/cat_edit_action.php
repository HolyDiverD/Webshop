<?php
session_start();
require '../../../private/conn_Webshop.php';

$category_id = $_GET['category_id'];
$category_name = $_POST['category_name'];

try{

}catch (PDOException $exception){
    $exception->getMessage();
}
