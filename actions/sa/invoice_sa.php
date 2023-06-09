<?php
if (isset($_SESSION['Userid'])) {
    $userid = $_SESSION['Userid'];
}
$total_price = 0;

if ($_SESSION['role'] == '') {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {

            $product_price = $item['price'] * $item['quantity'];
            $total_price += $product_price;
            $_SESSION['Total_Cart_Price'] = $total_price; ?>
            <tr>
                <td id=data-label="Name"> <?= $item['name'] ?> </td>
                <td id=data-label="EAN"> <?= $item['ean'] ?> </td>
                <td id=data-label="Price"> <?= $item['price'] ?> </td>
                <td id=data-label="Amount"> <?= $item['quantity'] ?> </td>
            </tr>
            <?php
        }
    }
} else {

    $sth = $dbh->prepare("
SELECT shoppingcart_id, FKproduct_id, p.product_id ,p.product_name, p.product_EAN, p.product_price, amount
FROM cart_products
JOIN products p on p.product_id = cart_products.FKproduct_id
JOIN shoppingbag s on cart_products.FKshoppingcart_id = s.shoppingcart_id
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
            <td id=data-label="Name"> <?= $row->product_name ?> </td>
            <td id=data-label="EAN"> <?= $row->product_EAN ?> </td>
            <td id=data-label="Price"> <?= $row->product_price ?> </td>
            <td id=data-label="Amount"> <?= $row->amount ?> </td>
        </tr>
    <?php }
}
