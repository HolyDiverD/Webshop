<?php
?>
<div class="product_edit_view">
    <table class="admintable" id = table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>EAN</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Price</th>
            <th>Delete</th>
        </tr>
        <?php
        include 'actions/sa/product_delete_sa.php';
        ?>
    </table>
</div>