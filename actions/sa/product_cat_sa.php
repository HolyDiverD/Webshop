<?php
try{
    $sth = $dbh->prepare("
SELECT category_id, category_name
FROM categories");

    $sth->execute();

    echo'<label for="categories">Choose category</label>';
    echo'<select class="category_select" id="category" name="categories" size="3">';
    while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
        echo '<option value="'.$row->category_id.'">'.$row->category_name.'</option>';
    }
    echo'</select><br><br>';
}
catch (PDOException $exception){
    $exception->getMessage();
}
