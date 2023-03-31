<?php
session_start();
require '../../../private/conn_Webshop.php';

$userid = $_SESSION['Userid'];

if ($_SESSION['role'] == '1'){

$stmt = $dbh->prepare("
INSERT INTO orders (FKuser_id) VALUES (:user)
",array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

$stmt->execute([
    'user' => $userid
]);

    $stmt = $dbh->prepare("
SELECT order_id FROM orders WHERE FKuser_id = :user
",array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->execute([
        'user' => $userid
    ]);
    $order = $stmt->fetch(PDO::FETCH_OBJ);
    $orderid = $order->order_id;

    $sth = $dbh->prepare("
SELECT * FROM cart_products 
    JOIN shoppingbag s on cart_products.FKshoppingcart_id = s.shoppingcart_id
    WHERE FKuser_id = :user 
",array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $sth->execute([
        'user' => $userid
    ]);
while($row = $sth->fetch(PDO::FETCH_OBJ)){
    $stmt = $dbh->prepare("
INSERT INTO order_products (FKorder_id, FKproduct_id, amount) 
VALUES (:orderid, :productid, :amount)
",array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute([
        'orderid' => $orderid,
        'productid' => $row->FKproduct_id,
        'amount' => $row->amount
    ]);
}

    $stmt = $dbh->prepare("
DELETE cart_products 
FROM cart_products 
    JOIN shoppingbag s on cart_products.FKshoppingcart_id = s.shoppingcart_id 
                     WHERE FKuser_id = :user
",array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->execute([
        'user' => $userid
    ]);

    $stmt = $dbh->prepare("
DELETE
FROM shoppingbag 
WHERE FKuser_id = :user
",array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->execute([
        'user' => $userid
    ]);
    $_SESSION['Total_Cart_Price'] = 0;
    $_SESSION['Customer_order_success'] = 'true';
    header('Location: ../../Webshop/index.php?page=main');
}
else{
    $_SESSION['Total_Cart_Price'] = 0;
    unset($_SESSION['cart']);
    $_SESSION['Guest_order_success'] = 'true';
    header('Location: ../../Webshop/index.php?page=main');
}
