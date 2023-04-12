<?php
session_start();
require '../../../private/conn_Webshop.php';

$productid = $_GET['pro_id'];
$cartid = $_GET['cartid'];


if ($_SESSION['role'] == '') {

    if (isset($_SESSION['cart'])) {
        if ($_SESSION['cart'][$productid]['quantity'] > 1) {

            $sth = $dbh->prepare("
            UPDATE products SET product_amount = (product_amount + 1) WHERE product_id = :proid",
                array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute([
                'proid' => $productid
            ]);

            $_SESSION['cart'][$productid]['quantity']--;

            header('Location: ../../Webshop/index.php?page=shoppingcart');
        } else {

            $sth = $dbh->prepare("
            UPDATE products SET product_amount = (product_amount + 1) WHERE product_id = :proid",
                array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute([
                'proid' => $productid
            ]);

            unset($_SESSION['cart']);
            $_SESSION['Total_Cart_Price'] = 0;
            header('Location: ../../Webshop/index.php?page=shoppingcart');
        }
    }
}

if ($_SESSION['role'] == '1') {

    try {
        $stmt = $dbh->prepare("
    SELECT amount FROM cart_products WHERE FKshoppingcart_id = :cartid AND FKproduct_id = :product
    ", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $stmt->execute([
            'cartid' => $cartid,
            'product' => $productid
        ]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);

        if ($row->amount >= 2) {
            try {

                $sth = $dbh->prepare("
            UPDATE products SET product_amount = (product_amount + 1) WHERE product_id = :proid",
                    array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute([
                    'proid' => $productid
                ]);

                $sth = $dbh->prepare("
            UPDATE cart_products SET amount = (amount - 1) WHERE FKshoppingcart_id = :cartid AND FKproduct_id = :product",
                    array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute([
                    'cartid' => $cartid,
                    'product' => $productid
                ]);

                header('Location: ../../Webshop/index.php?page=shoppingcart');
            } catch (PDOException $e) {
                $e->getMessage();
            }
        } else {

            $sth = $dbh->prepare("
            UPDATE products SET product_amount = (product_amount + 1) WHERE product_id = :proid",
                array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute([
                'proid' => $productid
            ]);

            $sth = $dbh->prepare("DELETE FROM cart_products WHERE FKshoppingcart_id = :cartid AND FKproduct_id = :product",
                array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

            $sth->execute([
                'cartid' => $cartid,
                'product' => $productid
            ]);

            $stmt = $dbh->prepare("SELECT * FROM cart_products WHERE FKshoppingcart_id =:cartid",
                array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $stmt->execute([
                'cartid' => $cartid
            ]);

            if ($stmt->rowcount() == 0) {

                $stmt = $dbh->prepare("DELETE FROM shoppingbag WHERE shoppingcart_id = :cartid",
                    array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $stmt->execute([
                    'cartid' => $cartid
                ]);

            }

            $_SESSION['Total_Cart_Price'] = 0;
            header('Location: ../../Webshop/index.php?page=shoppingcart');
        }


    } catch (PDOException $e) {
        $e->getMessage();
    }
}




