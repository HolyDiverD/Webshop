<?php
?>
<div class="cat_add">
    <form action="../../actions/action/cat_add_action.php" method="post" id="Add">
        <label for="category_name"><b>New Category</b></label>
        <input type="text" placeholder="Enter new category" name="category_name" required>

    </form>
    <button
            class="loginsubmit"
            type="submit"
            form="Add"
            onclick="return confirm('Are you sure you want to submit this info?');"
    >Add
    </button>
</div>
