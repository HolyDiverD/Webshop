<?php
$productid = $_GET['product_id'];
$productname = $_GET['product_name'];
$productEAN = $_GET['product_ean'];
$productamount = $_GET['product_amount'];
$productprice = $_GET['product_price'];

echo '</div>
<div class="editinput">
    <form action="actions/action/product_edit_action.php?product_id='.$productid.'" method="post" id="Edit">
        <label for="Product_id">
            <b>ID</b>
        </label>
        <input type="text" placeholder="Enter product id" name="Product_id" value="'.$productid.'" required>
        
        <label for="Product_name">
            <b>Name</b>
        </label>
        <input type="text" placeholder="Enter product name" name="Product_name" value="'.$productname.'" required>
    </form>';
?>
    <button onclick="return confirm('Are you sure you want to make this edit?')" class="loginsubmit" type="submit" form="Edit">
<?php
echo 'Edit   
    </button>

</div>';
