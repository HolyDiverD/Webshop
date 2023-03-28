<?php
session_start();
require '../../../private/conn_Webshop.php';
$product_id = $_GET['pro_id'];

try {
    $stmt = $dbh->prepare("
    SELECT amount FROM shoppingbag WHERE FKuser_id = :user AND FKproduct_id = :product
    ", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->execute([
        'user' => $_SESSION['Userid'],
        'product' => $product_id
    ]);
    $row = $stmt->fetch(PDO::FETCH_OBJ);

    if ($row->amount >= 2) {
        try {

            $sth = $dbh->prepare("
            UPDATE products SET product_amount = (product_amount + 1) WHERE product_id = :proid",
                array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute([
                'proid' => $product_id
            ]);

            $sth = $dbh->prepare("
            UPDATE shoppingbag SET amount = (amount - 1) WHERE FKuser_id = :user AND FKproduct_id = :product",
            array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute([
                'user' => $_SESSION['Userid'],
                'product' => $product_id
            ]);

            header('Location: ../../Webshop/index.php?page=shoppingcart');
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    else{

        $sth = $dbh->prepare("
            UPDATE products SET product_amount = (product_amount + 1) WHERE product_id = :proid",
            array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute([
            'proid' => $product_id
        ]);

        $sth = $dbh->prepare("DELETE FROM shoppingbag WHERE FKuser_id = :user AND FKproduct_id = :product",
            array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $sth->execute([
            'user' => $_SESSION['Userid'],
            'product' => $product_id
        ]);
        header('Location: ../../Webshop/index.php?page=shoppingcart');
    }


} catch (PDOException $e) {
    $e->getMessage();
}




