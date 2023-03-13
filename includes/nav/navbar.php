<?php

$role = $_SESSION['role'];
$name = $_SESSION['User_Name'];

$sth = $dbh->prepare("SELECT category_name FROM categories ");
$sth->execute();


if ($role == '1') {
    echo '<div class="navbar">';
    echo '<a class="home fa fa-home" href="index.php?page=main">Home</a>';
    echo '<div class="subnav">';
    echo '<button class="subnavbtn">' . $name . ' <i class="fa fa-caret-down"></i></button>';
    echo '<div class="subnav-content">';
    echo '<a href="index.php?page=logout">Logout</a>';
    echo '</div>';
    echo '</div>';
    echo '<div class="subnav">';
    echo '<button class="subnavbtn">Categories <i class="fa fa-caret-down"></i></button>';
    echo '<div class="subnav-content">';
    while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
        echo '<a href="index.php?page=products&cat='.$row->category_name.'">' . $row->category_name . '</a>';
    }
    echo '</div>';
    echo '</div>';
    echo '<a class="fa fa-shopping-cart cart" href="#"></a>';
    echo '</div>';

} elseif ($role == '2') {
    echo '<div class="navbar">
    <a class="home fa fa-home" href="index.php?page=admin">Home</a>
    <div class="subnav">
        <button class="subnavbtn">' . $name . ' <i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
            <a href="index.php?page=logout">Logout</a>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">Categories <i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
            <a href="index.php?page=category_add">Add</a>
            <a href="index.php?page=category_edit">Edit</a>
            <a href="index.php?page=category_delete">Delete</a>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">Products <i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
            <a href="index.php?page=product_add">Add</a>
            <a href="index.php?page=">Edit</a>
            <a href="index.php?page=">Delete</a>
        </div>
    </div>
    
</div>';
} else {
    echo '<div class="navbar">';
    echo '<a class="home fa fa-home" href="index.php?page=main">Home</a>';
    echo '<div class="subnav">';
    echo '<button class="subnavbtn">Guest <i class="fa fa-caret-down"></i></button>';
    echo '<div class="subnav-content">';
    echo '<a href="index.php?page=login">Login</a>';
    echo '<a href="index.php?page=register">Register</a>';
    echo '</div>';
    echo '</div>';
    echo '<div class="subnav">';
    echo '<button class="subnavbtn">Categories <i class="fa fa-caret-down"></i></button>';
    echo '<div class="subnav-content">';
    while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
        echo '<a href="#bring">' . $row->category_name . '</a>';
    }
    echo '</div>';
    echo '</div>';
    echo '<a class="fa fa-shopping-cart cart" href="#"></a>';

    echo '</div>';
}




