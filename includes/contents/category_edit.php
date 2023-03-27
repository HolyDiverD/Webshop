<?php
if (isset($_SESSION['cat_edit_fail'])) {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Category already exists!"); } 
    </script>';
    unset($_SESSION['Cat_edit_fail']);
}
?>
<div class="add">
    <table class="admintable" id=table>
        <tr>
            <th>Category</th>
            <th>Edit</th>
        </tr>
        <?php
        include 'actions/sa/cat_edit_sa.php';
        ?>
    </table>
</div>

