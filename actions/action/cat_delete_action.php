<?php
session_start();
require '../../../private/conn_Webshop.php';
$category_id = $_GET['cat_id'];

try {

    $sth = $dbh->prepare("
    DELETE FROM 
    categories 
    WHERE 
    category_id = :categoryid", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $sth->execute([
        ':categoryid' => $category_id
    ]);
    header('Location: ../../index.php?page=category_delete');

} catch (PDOException $exception) {
    $exception->getMessage();
}


