<?php

if (isset($_SESSION['AddCartSuccess'])) {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Product was added to the shopping cart!"); } 
    </script>';
    unset($_SESSION['AddCartSuccess']);
}
if (isset($_SESSION['AnotherOne'])) {
    echo '<script type="text/javascript">
       window.onload = function () { alert("We added another one to the shoppingcart!"); } 
    </script>';
    unset($_SESSION['AnotherOne']);
}

$categoryID = $_GET['ID'];

try {
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
            <p>EAN: <?= $row->product_EAN ?></p>
            <p>Price: €<?= $row->product_price ?>,-</p>

            <button class="AddToCartBttn"
                    onclick="location.href='actions/action/add_to_cart_action.php?pro_id=<?= $row->product_id ?>&cat_id=<?= $categoryID ?>&pro_name=<?= $row->product_name ?>&pro_EAN=<?= $row->product_EAN ?>&pro_price=<?= $row->product_price ?>'"
                    type="button">Add to cart
            </button>

        </div>
    <?php }

} catch (PDOException $exception) {
    $exception->getMessage();
}

?>















