<?php
$sth = $dbh->prepare("
SELECT category_id, category_name
FROM categories");

$sth->execute();
while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
    echo '<tr>';
    echo '<td id= data-label="Category">'.$row->category_name.'</td>';
    echo '<td data-label="Delete">';
    echo '<a href="actions/action/cat_delete_action.php?cat_id='.$row->category_id.'"/>';
    echo 'Delete';
    echo '</td>';
    echo '</tr>';
}