<?php
session_start();
require '../../../private/conn_Webshop.php';

$newcat = $_POST['category_name'];

$sth = $dbh->prepare("
    INSERT INTO 
    categories 
        (category_name) 
    VALUE 
        (:newcat)",
    array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

$sth->execute([
    ':newcat' => $newcat
]);
$_SESSION['CatAddSuccess'] = 'true';
header('Location: ../../Webshop/index.php?page=category_add');
?>
