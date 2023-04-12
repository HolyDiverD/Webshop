<?php
$productid = $_GET['product_id'];
$productname = $_GET['product_name'];
$productEAN = $_GET['product_ean'];
$productamount = $_GET['product_amount'];
$productprice = $_GET['product_price'];

if (isset($_GET['img'])) {
    $_SESSION['img_edit'] = 'true';
}

if (isset($_SESSION['product_edit_fail'])) {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Not all required fields are filled in."); } 
</script>';
    unset($_SESSION['product_edit_fail']);
}
?>
</div>
<div class="editinput">
    <form action="actions/action/product_edit_action.php?product_id=<?=$productid?>" method="post"
          enctype="multipart/form-data" id="Edit">
        <label for="Product_name">
            <b>Name</b>
        </label>
        <input type="text" placeholder="Enter product name" name="Product_name" value="<?= $productname ?>" required>

        <label for="Product_ean">
            <b>EAN code</b>
        </label>
        <input type="text" placeholder="Enter product name" name="Product_ean" value="<?= $productEAN ?>" required>

        <label for="Product_amount">
            <b>Amount</b>
        </label>
        <input type="text" placeholder="Enter amount" name="Product_amount" value="<?= $productamount ?>" required
               min="1">

        <label for="Product_price">
            <b>Price</b>
        </label>
        <input type="text" placeholder="Enter product price" name="Product_price" value="<?= $productprice ?>" required
               min="1">

        <?php
        if (!isset($_SESSION['img_edit'])) {
            ?>
            <p><button class=""
                    onclick="location.href='../../Webshop/index.php?page=product_edit_page&img=1&product_id=<?= $productid ?>&product_name=<?= $productname ?>&product_ean=<?= $productEAN ?>&product_amount=<?= $productamount ?>&product_price=<?= $productprice ?>'"
                    type="button">Edit Image
            </button></p>
            <?php
        } else {
            ?>
            <label for="img">
                <b>Image</b>
            </label>
            <input type="file" accept="image/*" name="img">
            <?php
        }
        ?>
        <?php
        include 'actions/sa/product_cat_sa.php';
        ?>
    </form>

    <button onclick="return confirm('Are you sure you want to make this edit?')" class="loginsubmit" type="submit"
            form="Edit">
        Edit
    </button>

</div>



