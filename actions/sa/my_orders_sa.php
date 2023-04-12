<?php
if (isset($_SESSION['Userid'])) {
    $userid = $_SESSION['Userid'];
}
$prev_order_id = 0;
$is_first_order = true;

$sth = $dbh->prepare("
SELECT o.order_id, o.date_of_creation, o.total_price, p.product_name, p.product_EAN, p.product_price, amount
FROM order_products
JOIN orders o on o.order_id = order_products.FKorder_id
JOIN products p on p.product_id = order_products.FKproduct_id
WHERE FKuser_id = :user
ORDER BY o.order_id", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

$sth->execute([
    ':user' => $userid
]);

while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
    if ($row->order_id != $prev_order_id) {
        if (!$is_first_order) {
            echo "</tbody></table><br>";
        }
        $is_first_order = false;
        ?>
        <p>Order ID: <?= $row->order_id ?><br> Date: <?= $row->date_of_creation ?><br> Total
            price: <?= $row->total_price ?></p>
        <table class="admintable" id=table>
        <thead>
        <tr>
            <th>EAN</th>
            <th>Name</th>
            <th>Price</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        <?php
    }
    ?>
    <tr>
        <td><?= $row->product_EAN ?></td>
        <td><?= $row->product_name ?></td>
        <td><?= $row->product_price ?></td>
        <td><?= $row->amount ?></td>
    </tr>
    <?php

    $prev_order_id = $row->order_id;
}

if (!$is_first_order) {
    echo "</tbody></table><br>";
}
