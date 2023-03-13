<?php
session_start();
require '../../../private/conn_Webshop.php';

$newcat = $_POST['category_name'];
try {
    $stmt = $dbh->prepare("
             SELECT * 
             FROM categories 
             WHERE category_name = :catname",
        array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->execute([
        ':catname' => $newcat
    ]);

    if ($stmt->rowcount() > 0) {
        $_SESSION['CatAddFail'] = 'true';
        header('Location: ../../Webshop/index.php?page=category_add');
    } else {
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
    }
} catch (PDOException $exception) {
    $exception->getMessage();
}



