<?php
session_start();
require '../../../private/conn_Webshop.php';

$category_id = $_GET['category_id'];
$category_name = $_POST['category_name'];

try{
    $stmt = $dbh->prepare("UPDATE categories
SET category_name = :newname
WHERE category_id = :catid", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->execute([
        ':newname' => $category_name,
        ':catid' => $category_id
    ]);

    header('Location:  ../../index.php?page=category_edit');
}
catch (PDOException $exception){
    $exception->getMessage();
}
