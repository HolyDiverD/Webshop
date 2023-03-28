<?php
session_start();
require '../../../private/conn_Webshop.php';

$userid = $_SESSION['Userid'];
$productid = $_GET['pro_id'];
$categoryid = $_GET['cat_id'];
$productname = $_GET['pro_name'];
$productEAN = $_GET['pro_EAN'];
$productprice = $_GET['pro_price'];

if($_SESSION['role'] == '' && isset($_SESSION['cart'][$productid])){

    $stmt = $dbh->prepare("
    UPDATE products 
    SET product_amount = (product_amount - 1)
    WHERE product_id = :productid
    ", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->execute([
        ':productid' => $productid
    ]);

    $_SESSION['cart'][$productid]['quantity']++;


    header('Location:  ../../Webshop/index.php?page=shoppingcart');

}

if($_SESSION['role'] == '1'){
$stmt = $dbh->prepare("
    UPDATE products 
    SET product_amount = (product_amount - 1)
    WHERE product_id = :productid
    ", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

$stmt->execute([
    ':productid' => $productid
]);

$stmt = $dbh->prepare("
        UPDATE shoppingbag 
        SET amount = (amount + 1)
        WHERE FKproduct_id = :productid AND FKuser_id = :userid",
    array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$stmt->execute([
    ':productid' => $productid,
    ':userid' => $userid
]);


header('Location:  ../../Webshop/index.php?page=shoppingcart');
}