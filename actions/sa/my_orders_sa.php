<?php
if(isset($_SESSION['Userid'])){
    $userid = $_SESSION['Userid'];
}
$total_price = 0;


$sth = $dbh->prepare("
SELECT o.order_id, o.date_of_creation, p.product_name, p.product_EAN, p.product_price, amount
FROM order_products
JOIN orders o on o.order_id = order_products.FKorder_id
JOIN products p on p.product_id = order_products.FKproduct_id
WHERE FKuser_id = :user", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

$sth->execute([
    ':user' => $userid
]);

while ($row = $sth->fetch(PDO::FETCH_OBJ)) {

    $product_price = $row->product_price * $row->amount;
    $total_price += $product_price;
    $_SESSION['Total_Cart_Price'] = $total_price;
    ?>

    <tr>
        <td id=data-label="ID"> <?= $row->order_id ?> </td>
        <td id=data-label="Date"> <?= $row->date_of_creation ?> </td>
        <td id=data-label="Name"> <?= $row->product_name ?> </td>
        <td id=data-label="EAN"> <?= $row->product_EAN ?> </td>
        <td id=data-label="Price"> <?= $row->product_price ?> </td>
        <td id=data-label="Amount"> <?= $row->amount ?> </td>
    </tr>
<?php }