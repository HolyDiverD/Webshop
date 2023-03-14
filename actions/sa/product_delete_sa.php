<?php
try {
    $sth = $dbh->prepare("
SELECT product_id, product_name, product_EAN, product_amount, product_price, FKcategory_id
FROM products");
    $sth->execute();
    while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
        echo '<tr>';
        echo '<td id= data-label="ID">' . $row->product_id . '</td>';
        echo '<td id= data-label="Name">' . $row->product_name . '</td>';
        echo '<td id= data-label="EAN">' . $row->product_EAN . '</td>';
        echo '<td id= data-label="Category">' . $row->FKcategory_id . '</td>';
        echo '<td id= data-label="Amount">' . $row->product_amount . '</td>';
        echo '<td id= data-label="Price">' . $row->product_price . '</td>';
        echo '<td data-label="Delete">';
        echo '<a href="actions/action/product_delete_action.php?pro_id=' . $row->product_id . '"/>';
        echo 'Delete';
        echo '</td>';
        echo '</tr>';
    }
}catch (PDOException $exception){
    $exception->getMessage();
}