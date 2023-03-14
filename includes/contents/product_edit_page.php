<?php
$productid = $_GET['product_id'];
$productname = $_GET['product_name'];
$productEAN = $_GET['product_ean'];
$productamount = $_GET['product_amount'];
$productprice = $_GET['product_price'];

if(is_null($_SESSION['product_edit_fail'])){
    $_SESSION['product_edit_fail'] = '';
}

if($_SESSION['product_edit_fail'] == 'true') {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Not all required fields are filled in."); } 
</script>';
}
$_SESSION['product_edit_fail'] = '';

echo '</div>
<div class="editinput">
    <form action="actions/action/product_edit_action.php?product_id='.$productid.'" method="post" id="Edit">
        <label for="Product_name">
            <b>Name</b>
        </label>
        <input type="text" placeholder="Enter product name" name="Product_name" value="'.$productname.'" required>
        
        <label for="Product_ean">
            <b>EAN code</b>
        </label>
        <input type="text" placeholder="Enter product name" name="Product_ean" value="'.$productEAN.'" required>
        
        <label for="Product_amount">
            <b>Amount</b>
        </label>
        <input type="text" placeholder="Enter amount" name="Product_amount" value="'.$productamount.'" required>
        
        <label for="Product_price">
            <b>Price</b>
        </label>
        <input type="text" placeholder="Enter product price" name="Product_price" value="'.$productprice.'" required>
        
        <label for="Product_img">
            <b>Image</b>
        </label>
        <input type="text" placeholder="Enter product image url" name="Product_img">
        
        '; include 'actions/sa/product_cat_sa.php';
echo '</form>';
?>
    <button onclick="return confirm('Are you sure you want to make this edit?')" class="loginsubmit" type="submit" form="Edit">
<?php
echo 'Edit   
    </button>

</div>';
