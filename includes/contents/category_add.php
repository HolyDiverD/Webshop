<?php
if (isset($_SESSION['CatAddFail'])) {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Category already exists!"); } 
    </script>';
    unset($_SESSION['CatAddFail']);
}
if (isset($_SESSION['CatAddSuccess'])) {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Category was successfully added!"); } 
</script>';
    unset($_SESSION['CatAddSuccess']);
}

?>
<div class="add">
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
