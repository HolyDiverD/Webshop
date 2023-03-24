<?php
try {
    $sth = $dbh->prepare("
SELECT category_id, category_name
FROM categories", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $sth->execute();

    echo '<label for="category">Choose category: </label>';
    echo '<select class="category_select" id="category" name="category" size="3">';
    while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
        echo '<option value="' . $row->category_id . '">' . $row->category_name . '</option>';
    }
    echo '</select><br><br>';
} catch (PDOException $exception) {
    $exception->getMessage();
}
