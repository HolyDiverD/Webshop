<?php
session_start();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
else {
    $page = 'main';
    $_SESSION['role'] = 'null';
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

include 'includes/contents/'.$page.'.php';
?>

</body>
</html>