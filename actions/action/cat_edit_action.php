<?php
session_start();
require '../../../private/conn_Webshop.php';

$category_id = $_GET['category_id'];
$category_name = $_POST['category_name'];

$stmt = $dbh->prepare("
             SELECT * 
             FROM categories 
             WHERE category_name = :catname",
    array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

$stmt->execute([
    ':catname' => $category_name
]);

if ($stmt->rowcount() > 0) {
    $_SESSION['cat_edit_fail'] = 'true';
    header('Location:  ../../index.php?page=category_edit');
} else {
    try {
        $stmt = $dbh->prepare("UPDATE categories
SET category_name = :newname
WHERE category_id = :catid", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $stmt->execute([
            ':newname' => $category_name,
            ':catid' => $category_id
        ]);

        header('Location:  ../../index.php?page=category_edit');
    } catch (PDOException $exception) {
        $exception->getMessage();
    }
}



