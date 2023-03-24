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

$total_price = 0;

while ($row = $sth->fetch(PDO::FETCH_OBJ)) {

    $product_price = $row->product_price * $row->amount;
    $total_price += $product_price;
    $_SESSION['Total_Cart_Price'] = $total_price;
    ?>

    <tr>
        <td id=data-label="Name"> <?= $row->product_name ?> </td>
        <td id=data-label="EAN"> <?= $row->product_EAN ?> </td>
        <td id=data-label="Price"> <?= $row->product_price ?> </td>
        <td id=data-label="Remove">
            <a href="../../actions/action"/>
            <i class="fa fa-minus"></i>
        </td>
        <td id=data-label="Amount"> <?= $row->amount ?> </td>
        <td id=data-label="Add">
            <a href="../../actions/action"/>
            <i class="fa fa-plus"></i>
        </td>
    </tr>
<?php }