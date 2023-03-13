<?php
?>
<div class="add">
    <form action="" method="post" id="Add">
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

        <?php
        include 'actions/sa/product_cat_sa.php';
        ?>
    </form>
    <button class="loginsubmit" type="submit" form="Add">Add</button>
</div>