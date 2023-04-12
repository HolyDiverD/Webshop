<?php
?>
<div class="Admin_order_selection">
    <table class="admintable" id=table>
        <tr>
            <th>User</th>
            <th>Orders</th>
        </tr>
    <?php
    include 'actions/sa/admin_order_user_sa.php';
    ?>
    </table>
</div>
<div class="Admin_order_view">
        <?php
        include 'actions/sa/admin_order_sa.php';
        ?>
</div>
