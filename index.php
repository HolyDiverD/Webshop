<?php
session_start();
require '../private/conn_Webshop.php';

$adminpages = array(
        'admin',
    'cat_edit_page',
    'category_add',
    'category_delete',
    'category_edit',
    'product_add',
    'product_delete',
    'product_edit',
    'product_edit_page');

$customerpages = array(
        'login',
        'main',
        'register',
        'shoppingcart',
        'products'
);

if (is_null($_SESSION['role'])) {
    $_SESSION['role'] = '';
}
if ($_SESSION['role'] == '') {
    $_SESSION['User_Name'] = '';
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'main';
}
if ($page == 'logout') {
    $_SESSION['role'] = '';
    $_SESSION['Userid'] = '';
    $page = 'main';
}
if ($_SESSION['role'] == '' && in_array($page, $adminpages)){
    $page = 'main';
}
if ($_SESSION['role'] == '1' && in_array($page, $adminpages)){
    $page = 'main';
}
if ($_SESSION['role'] == '2' && in_array($page, $customerpages)){
    $page = 'admin';
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Webshop</title>
    <link rel="stylesheet" href="CSS/Stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="body">
<?php
include 'includes/nav/navbar.php';

include 'includes/contents/' . $page . '.php';
?>

</body>
</html>