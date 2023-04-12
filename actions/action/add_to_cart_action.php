<?php
echo "<pre>", print_r($_GET), "</pre>";
echo "<pre>", print_r($_POST), "</pre>";
session_start();
require '../../../private/conn_Webshop.php';

$userid = $_SESSION['Userid'];
$productid = $_GET['pro_id'];
$categoryid = $_GET['cat_id'];
$productname = $_GET['pro_name'];
$productEAN = $_GET['pro_EAN'];
$productprice = $_GET['pro_price'];


if ($_SESSION['role'] == '' && isset($_SESSION['cart'][$productid])) {
    $stmt = $dbh->prepare("
    UPDATE products 
    SET product_amount = (product_amount - 1)
    WHERE product_id = :productid
    ", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->execute([
        ':productid' => $productid
    ]);

    $_SESSION['cart'][$productid]['quantity']++;

    $_SESSION['AnotherOne'] = 'true';
    header('Location:  ../../index.php?page=products&ID=' . $categoryid . '');
} else {
    $stmt = $dbh->prepare("
    UPDATE products 
    SET product_amount = (product_amount - 1)
    WHERE product_id = :productid
    ", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->execute([
        ':productid' => $productid
    ]);

    $_SESSION['cart'][$productid] = array(
        'id' => $productid,
        'name' => $productname,
        'ean' => $productEAN,
        'price' => $productprice,
        'quantity' => 1
    );

    $_SESSION['AddCartSuccess'] = 'true';
    header('Location:  ../../index.php?page=products&ID=' . $categoryid . '');
}

if ($_SESSION['role'] == '1') {
    try {
        $sth = $dbh->prepare("
SELECT shoppingcart_id, FKproduct_id, FKuser_id, amount
FROM shoppingbag
JOIN cart_products cp on shoppingbag.shoppingcart_id = cp.FKshoppingcart_id
WHERE FKuser_id = :userid AND FKproduct_id = :productid", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $sth->execute([
            ':userid' => $userid,
            ':productid' => $productid
        ]);

        $firstrow = $sth->fetch(PDO::FETCH_OBJ);

        if ($sth->rowcount() > 0) {

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
        JOIN cart_products cp on shoppingbag.shoppingcart_id = cp.FKshoppingcart_id
        SET cp.amount = (cp.amount + 1)
        WHERE FKproduct_id = :productid AND FKuser_id = :userid",
                array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $stmt->execute([
                ':productid' => $productid,
                ':userid' => $userid
            ]);

            $_SESSION['AnotherOne'] = 'true';
            header('Location:  ../../index.php?page=products&ID=' . $categoryid . '');
        } else {

            if ($firstrow->shoppingcart_id == 0) {

                $stmt = $dbh->prepare("
    UPDATE products 
    SET product_amount = (product_amount - 1)
    WHERE product_id = :productid
    ", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

                $stmt->execute([
                    ':productid' => $productid
                ]);

                $stmt = $dbh->prepare("
    INSERT INTO shoppingbag (FKuser_id)
    VALUES (:userid)", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

                $stmt->execute([
                    ':userid' => $userid,
                ]);

                $sth = $dbh->prepare("SELECT shoppingcart_id 
                                  FROM shoppingbag WHERE FKuser_id = :user",
                    array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

                $sth->execute([
                    'user' => $userid
                ]);

                $row = $sth->fetch(PDO::FETCH_OBJ);

                $stmt = $dbh->prepare("INSERT INTO cart_products (FKshoppingcart_id, FKproduct_id, amount) 
                                   VALUES (:cartid,:productid, 1)");

                $stmt->execute([
                    'cartid' => $row->shoppingcart_id,
                    'productid' => $productid
                ]);


                $_SESSION['AddCartSuccess'] = 'true';
                header('Location:  ../../index.php?page=products&ID=' . $categoryid . '');
            } else {

                $sth = $dbh->prepare("SELECT shoppingcart_id 
                                  FROM shoppingbag WHERE FKuser_id = :user",
                    array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

                $sth->execute([
                    'user' => $userid
                ]);

                $row = $sth->fetch(PDO::FETCH_OBJ);

                $stmt = $dbh->prepare("INSERT INTO cart_products (FKshoppingcart_id, FKproduct_id, amount) 
                                   VALUES (:cartid,:productid, 1)");

                $stmt->execute([
                    'cartid' => $row->shoppingcart_id,
                    'productid' => $productid
                ]);


                $_SESSION['AddCartSuccess'] = 'true';
                header('Location:  ../../index.php?page=products&ID=' . $categoryid . '');

            }


        }
    } catch (PDOException $exception) {
        $exception->getMessage();
    }

}

