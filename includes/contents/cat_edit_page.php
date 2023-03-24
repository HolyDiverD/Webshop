<?php
echo '</div>
<div class="editinput">
    <form action="actions/action/cat_edit_action.php?category_id=' . $_GET['cat_id'] . '" method="post" id="Add">
        <label for="category_name">
            <b>Edit category</b>
        </label>
        <input type="text" placeholder="Enter category" name="category_name" value="' . $_GET['cat_name'] . '" required>
    </form>';
?>
    <button onclick="return confirm('Are you sure you want to make this edit?')" class="loginsubmit" type="submit"
            form="Add">
<?php
echo 'Edit   
    </button>

</div>';