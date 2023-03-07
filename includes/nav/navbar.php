<?php
$role = $_SESSION['role'];
$name = $_SESSION['User_Name'];

if ($role == '1'){
    echo'<div class="navbar">
    <a class="home fa fa-home" href="index.php?page=main">Home</a>
    <div class="subnav">
        <button class="subnavbtn">'.$name.' <i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
            <a href="index.php?page=logout">Logout</a>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">Categories <i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
            <a href="#bring">Games</a>
            <a href="#deliver">Platforms</a>
            <a href="#package">Accessories</a>
        </div>
    </div>
    <a class="fa fa-shopping-cart cart" href="#"></a>

</div>';
}
elseif ($role == '2') {
    echo '<div class="navbar">
    <a class="home fa fa-home" href="index.php?page=admin">Home</a>
    <div class="subnav">
        <button class="subnavbtn">'.$name.' <i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
            <a href="index.php?page=logout">Logout</a>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">Categories <i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
            <a href="index.php?page=category_add">Add</a>
            <a href="index.php?page=">Edit</a>
            <a href="index.php?page=">Delete</a>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">Products <i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
            <a href="index.php?page=products_add">Add</a>
            <a href="index.php?page=">Edit</a>
            <a href="index.php?page=">Delete</a>
        </div>
    </div>
    
</div>';
}
else{
    echo '<div class="navbar">
    <a class="home fa fa-home" href="index.php?page=main">Home</a>
    <div class="subnav">
        <button class="subnavbtn">Guest <i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
            <a href="index.php?page=login">Login</a>
            <a href="index.php?page=register">Register</a>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">Categories <i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
            <a href="#bring">Games</a>
            <a href="#deliver">Platforms</a>
            <a href="#package">Accessories</a>
        </div>
    </div>
    <a class="fa fa-shopping-cart cart" href="#"></a>

</div>';
}


?>

