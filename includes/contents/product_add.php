<?php
if(is_null($_SESSION['product_add_fail'])){
    $_SESSION['product_add_fail'] = '';
}
?>
<div class="add">
    <form action="actions/action/product_add_action.php" method="post" id="Add">
        <label for="name"><b>Product name</b></label>
        <input type="text" placeholder="Enter product name" name="name" required>

        <label for="ean">
            <b>EAN</b>
        </label>
        <input type="text" placeholder="Enter EAN" name="ean" required>

        <label for="price">
            <b>Price</b>
        </label>
        <input type="text" placeholder="Enter Price" name="price" required>

        <label for="amount">
            <b>Amount</b>
        </label>
        <input type="text" placeholder="Enter Amount" name="amount" required>

        <?php
        include 'actions/sa/product_cat_sa.php';
        ?>
    </form>
    <button class="loginsubmit" type="submit" form="Add">Add</button>
</div>