<?php
?>
    <div class="product_edit_view">
        <table class="admintable" id=table>
            <tr>
                <th>Name</th>
                <th>EAN</th>
                <th>Price</th>
                <th>Remove</th>
                <th>Amount</th>
                <th>Add</th>
            </tr>
            <p> Total Price: <?= $_SESSION['Total_Cart_Price']?> </p>
            <?php
            include 'actions/sa/shoppingcart_sa.php';
            ?>
        </table>

    </div>