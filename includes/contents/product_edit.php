<?php
?>
<div class="AdminTable_con">
    <table class="admintable" id = table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>EAN</th>
            <th>Amount</th>
            <th>Price</th>
            <th>Edit</th>
        </tr>
        <?php
        include 'actions/sa/product_edit_sa.php';
        ?>
    </table>
</div>