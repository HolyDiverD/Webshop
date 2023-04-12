<?php
session_start();
require '../../../private/conn_Webshop.php';

$productname = $_POST['name'];
$EAN = $_POST['ean'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$category = $_POST['category'];
$image = base64_encode(file_get_contents($_FILES['img']['tmp_name']));

try {

    $stmt = $dbh->prepare("
             SELECT *
             FROM products
             WHERE product_EAN = :productEAN",
        array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->execute([
        ':productEAN' => $EAN
    ]);

    if ($stmt->rowcount() > 0) {
        $_SESSION['product_add_fail'] = 'true';
        header('Location: ../../Webshop/index.php?page=product_add');
    } else {
        if ($productname != '' &&
            $EAN != '' &&
            $price != '' &&
            $amount > 0 &&
            $category != '') {

            $sth = $dbh->prepare("
                INSERT INTO
                products
                (product_name, product_EAN, product_price, product_amount, FKcategory_id, product_img)
                VALUE
                (:productname, :productEAN, :productprice, :productamount, :category, :image)",
                array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

            $sth->execute([
                ':productname' => $productname,
                ':productEAN' => $EAN,
                ':productprice' => $price,
                ':productamount' => $amount,
                ':category' => $category,
                ':image' => $image
            ]);
            $_SESSION['product_add_success'] = 'true';
            header('Location: ../../index.php?page=product_add');
        } else {
            $_SESSION['product_input_fail'] = 'true';
            header('Location: ../../index.php?page=product_add');
        }

    }
} catch (PDOException $exception) {
    $exception->getMessage();
}