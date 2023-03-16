<?php
echo "<pre>", print_r($_GET), "</pre>";
echo "<pre>", print_r($_POST), "</pre>";
session_start();
require '../../../private/conn_Webshop.php';

$userid = $_SESSION['Userid'];
$productid = $_GET['pro_id'];

try{
    $sth = $dbh->prepare("
SELECT FKproduct_id, FKuser_id, amount
FROM shoppingbag
WHERE FKuser_id = :userid AND FKproduct_id = :productid", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $sth->execute([
        ':userid' => $userid,
        ':productid' => $productid
    ]);

    if($sth->rowcount() > 0){
        $stmt = $dbh->prepare("
        UPDATE shoppingbag 
        SET amount = (amount + 1)
        WHERE FKproduct_id = :productid AND FKuser_id = :userid",
            array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute([
            ':productid' => $productid,
            ':userid' => $userid
        ]);

        header('Location:  ../../index.php?page=products');
    }
    else{
    $stmt = $dbh->prepare("
    INSERT INTO shoppingbag (FKuser_id, FKproduct_id, amount)
VALUES (:userid, :productid, 1)", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->execute([
        ':userid' => $userid,
        ':productid' => $productid
    ]);
        header('Location:  ../../index.php?page=products');
    }
}
catch(PDOException $exception){
    $exception->getMessage();
}