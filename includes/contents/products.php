<?php
$categoryID = $_GET['ID'];

try{
    $sth = $dbh->prepare("
SELECT product_id, product_name, product_EAN, product_price, product_img
FROM products
WHERE FKcategory_id = :categoryid");

    $sth->execute([
        ':categoryid' => $categoryID
    ]);

      while ($row = $sth->fetch(PDO::FETCH_OBJ)) {

       echo'<div class="product_list_view">';
         echo '<div class="product_list_img">';
         echo '<img src="'.$row->product_img.'">';
          echo '</div>';
          echo '<p>'.$row->product_name.'<br><br>';
          echo 'ID: '.$row->product_id.'<br><br>';
          echo 'EAN: '.$row->product_EAN.'<br><br>';
          echo 'Price: €'.$row->product_price.',-';
          echo '</p>';
          echo '<button class="AddToCartBttn" type="button" value="" onclick="return confirm('."Do you want to add this item to the shopping cart?".')"';
          echo '</div>Add to cart</button>';
          echo '</div>';
      }

}catch (PDOException $exception){
    $exception->getMessage();
}

?>















