<?php
$categoryID = $_GET['ID'];

try{
    $sth = $dbh->prepare("
SELECT product_id, product_name, product_EAN, product_price, product_amount, product_img
FROM products
WHERE FKcategory_id = :categoryid");

    $sth->execute([
        ':categoryid' => $categoryID
    ]);

      while ($row = $sth->fetch(PDO::FETCH_OBJ)) {

       echo'<div class="product_list_view">';
         echo '<div class="product_list_img">';
          echo '<form action="../../actions/action/add_to_cart_action.php
          ?pro_id='.$row->product_id.'
          &pro_name='.$row->product_name.'
          &pro_EAN='.$row->product_EAN.'" method="post" id="Cart">';
         echo '<img src="'.$row->product_img.'">';
          echo '</div>';
          echo '<p>'.$row->product_name.'<br><br>';
          echo 'ID: '.$row->product_id.'<br><br>';
          echo 'EAN: '.$row->product_EAN.'<br><br>';
          echo 'Price: €'.$row->product_price.',-';
          echo '</p>';
          echo '</form>';
          echo '<button class="AddToCartBttn" type="submit" form="Cart"';
          echo '</div>Add to cart</button>';
          echo '</div>';
      }

}catch (PDOException $exception){
    $exception->getMessage();
}

?>















