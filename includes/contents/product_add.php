<?php
if (isset($_SESSION['product_add_fail'])) {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Product already exists!"); } 
</script>';
    unset($_SESSION['product_add_fail']);
}
if (isset($_SESSION['product_add_success'])) {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Product was successfully added!"); } 
</script>';
    unset($_SESSION['product_add_success']);
}
if (isset($_SESSION['product_input_fail'])) {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Not every required field was filled in."); } 
</script>';
    unset($_SESSION['product_input_fail']);
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

        <label for="img">
            <b>Image</b>
        </label>
        <input type="text" placeholder="Enter image url" name="img" required>

        <?php
        include 'actions/sa/product_cat_sa.php';
        ?>
    </form>
    <button class="loginsubmit" type="submit" form="Add">Add</button>
</div>