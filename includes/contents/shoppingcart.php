<?php
$userid = $_SESSION['Userid'];

$sth = $dbh->prepare("
SELECT shoppingcart_id, p.product_name, p.product_EAN, p.product_price, amount
FROM shoppingbag
JOIN products p on shoppingbag.FKproduct_id = p.product_id
WHERE FKuser_id = :user", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

$sth->execute([
    ':user' => $userid
]);
