<?php
if(!isset($_SESSION['User_On_Display'])){
    $_SESSION['User_On_Display'] = 'No one';
}
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
    <p>Current user displayed: <?= $_SESSION['User_On_Display']?></p>
    <?php
        include 'actions/sa/admin_order_sa.php';
        ?>
</div>
