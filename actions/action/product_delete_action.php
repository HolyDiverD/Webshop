<?php

session_start();
require '../../../private/conn_Webshop.php';
$product_id = $_GET['pro_id'];

try {

    $sth = $dbh->prepare("
    DELETE FROM 
    products 
    WHERE 
    product_id = :productid", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $sth->execute([
        ':productid' => $product_id
    ]);

    header('Location: ../../index.php?page=product_delete');

}catch (PDOException $exception){
    $exception->getMessage();
}