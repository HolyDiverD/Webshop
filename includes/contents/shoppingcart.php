<?php
If(isset($_SESSION['Cart_Empty_Error'])){
    echo '<script type="text/javascript">
       window.onload = function () { alert("Your shoppingcart is empty!"); } 
</script>';
    unset($_SESSION['Cart_Empty_Error']);
}
?>
    <div class="product_edit_view">
        <table class="admintable" id=table>
            <button class="OrderCartBttn" onclick="location.href='../../Webshop/index.php?page=order'"
                    type="button">Order</button>
            <tr>
                <th>Name</th>
                <th>EAN</th>
                <th>Price</th>
                <th>Remove</th>
                <th>Amount</th>
                <th>Add</th>
            </tr>
            <?php
            include 'actions/sa/shoppingcart_sa.php';
            ?>
            <p> Total Price: <?= $_SESSION['Total_Cart_Price']?> </p>
        </table>

    </div>