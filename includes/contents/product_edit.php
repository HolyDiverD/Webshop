<?php

if(is_null($_SESSION['product_edit_success'])) {
    $_SESSION['product_edit_success'] = '';
}
if($_SESSION['product_edit_success'] == 'true') {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Product was successfully edited!"); } 
</script>';
}
$_SESSION['product_edit_success'] = '';
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
            <th>Edit</th>
        </tr>
        <?php
        include 'actions/sa/product_edit_sa.php';
        ?>
    </table>
</div>