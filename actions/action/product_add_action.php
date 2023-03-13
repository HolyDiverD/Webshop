<?php
session_start();
require '../../../private/conn_Webshop.php';

$productname = $_POST['name'];
$EAN = $_POST['ean'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$category = $_POST['category'];

echo $productname;
echo $EAN;
echo $price;
echo $amount;
echo $category;

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
        $sth = $dbh->prepare("
    INSERT INTO
    products
        (product_name, product_EAN, product_price, product_amount, FKcategory_id)
    VALUE
        (:productname, :productEAN, :productprice, :productamount, :category)",
            array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $sth->execute([
            ':productname' => $productname,
            ':productEAN' => $EAN,
            ':productprice' => $price,
            ':productamount' => $amount,
            ':category' => $category
        ]);
        $_SESSION['CatAddSuccess'] = 'true';
        header('Location: ../../Webshop/index.php?page=product_add');
    }
} catch (PDOException $exception) {
    $exception->getMessage();
}