<?php

$sth = $dbh->prepare("
SELECT category_id, category_name
FROM categories");

$sth->execute();
while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
    echo '<tr>';
    echo '<td id= data-label="Category">' . $row->category_name . '</td>';
    echo '<td data-label="Edit">';
    echo '<a href="index.php?page=edit_page&cat_id=' . $row->category_id . '&cat_name='.$row->category_name.'"/>';
    echo 'Edit';
    echo '</td>';
    echo '</tr>';
}