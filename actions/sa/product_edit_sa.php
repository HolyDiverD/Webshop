<?php

try {
    $sth = $dbh->prepare("
SELECT product_id, product_name, product_EAN, product_amount, product_price, FKcategory_id
FROM products
");

    $sth->execute();
    while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
        echo '<tr>';
        echo '<td data-label="ID">
              ' . $row->product_id . '
              </td>';
        echo '<td data-label="Name">
              ' . $row->product_name . '
              </td>';
        echo '<td data-label="EAN">
              ' . $row->product_EAN . '
              </td>';
        echo '<td data-label="Category">
              ' . $row->FKcategory_id . '
              </td>';
        echo '<td data-label="Amount">
              ' . $row->product_amount . '
              </td>';
        echo '<td data-label="Price">
              ' . $row->product_price . '
              </td>';
        echo '<td data-label="Edit">';
        echo '<a href="index.php?page=product_edit_page&product_id=' . $row->product_id . '
        &product_name=' . $row->product_name . '
        &product_ean=' . $row->product_EAN . '
        &product_amount=' . $row->product_amount . '
        &product_price=' . $row->product_price . '"/>';
        echo 'Edit';
        echo '</td>';
        echo '</tr>';
    }
} catch (PDOException $exception) {
    $exception->getMessage();
}
