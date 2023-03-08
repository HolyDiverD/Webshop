<?php
if(is_null($_SESSION['CatAddFail'])){
    $_SESSION['CatAddFail'] = '';
}
if(is_null($_SESSION['CatAddSuccess'])){
    $_SESSION['CatAddSuccess'] = '';
}
if($_SESSION['CatAddFail'] == 'true') {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Category already exists!"); } 
</script>';
}
if($_SESSION['CatAddSuccess'] == 'true') {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Category was successfully added!"); } 
</script>';
}

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
