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

      while ($row = $sth->fetch(PDO::FETCH_OBJ)) { ?>

            <div class="product_list_view">
            <div class="product_list_img">
                <img class="myimage" src="<?= $row->product_img ?>">
            </div>
                <p><?= $row->product_name ?></p>
                <p>ID: <?= $row->product_id ?></p>
                <p>EAN: <?= $row->product_EAN ?></p>
                <p>Price: €<?= $row->product_price ?>,-</p>

                <button class="AddToCartBttn" onclick="location.href='actions/action/add_to_cart_action.php?pro_id=<?= $row->product_id ?>&pro_name=<?= $row->product_name ?>&pro_EAN=<?= $row->product_EAN ?>'" type="button">Add to cart
                </button>

            </div>
   <?php   }

}catch (PDOException $exception){
    $exception->getMessage();
}

?>















