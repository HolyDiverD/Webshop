<?php
session_start();
require '../../../private/conn_Webshop.php';

$productid = $_GET['product_id'];
$product_name = $_POST['Product_name'];
$product_EAN = $_POST['Product_ean'];
$product_amount = $_POST['Product_amount'];
$product_price = $_POST['Product_price'];
if (isset($_SESSION['img_edit'])){
    $product_image = base64_encode(file_get_contents($_FILES['img']['tmp_name']));
}
$product_category = $_POST['category'];

if ($product_name != '' &&
    $product_EAN != '' &&
    $product_amount != '' &&
    $product_price != '') {
    if (isset($_SESSION['img_edit'])) {
        try {
            $stmt = $dbh->prepare("UPDATE products
SET product_name = :newname,
    product_EAN = :newEAN, 
    product_amount = :newamount, 
    product_price = :newprice, 
    product_img = :newimg,
    FKcategory_id = :newcategory
WHERE product_id = :proid", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

            $stmt->execute([
                ':proid' => $productid,
                ':newname' => $product_name,
                ':newEAN' => $product_EAN,
                ':newamount' => $product_amount,
                ':newprice' => $product_price,
                ':newimg' => $product_image,
                ':newcategory' => $product_category

            ]);
            $_SESSION['product_edit_success'] = 'true';
            unset($_SESSION['img_edit']);
            header('Location:  ../../index.php?page=product_edit');
        } catch (PDOException $exception) {
            $exception->getMessage();
        }

    } else {
        try {
            $stmt = $dbh->prepare("UPDATE products
SET product_name = :newname,
    product_EAN = :newEAN, 
    product_amount = :newamount, 
    product_price = :newprice,
    FKcategory_id = :newcategory
WHERE product_id = :proid", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

            $stmt->execute([
                ':proid' => $productid,
                ':newname' => $product_name,
                ':newEAN' => $product_EAN,
                ':newamount' => $product_amount,
                ':newprice' => $product_price,
                ':newcategory' => $product_category
            ]);
            $_SESSION['product_edit_success'] = 'true';
            header('Location:  ../../index.php?page=product_edit');
        } catch (PDOException $exception) {
            $exception->getMessage();
        }
    }

} else {
    $_SESSION['product_edit_fail'] = 'true';
    header('Location:  ../../index.php?page=product_edit_page');
}


