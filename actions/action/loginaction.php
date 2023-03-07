<?php
session_start();
require '../../../private/conn_Webshop.php';

$inputpassword = $_POST['psw'];

$sql = 'SELECT user_id, user_email, user_firstname, user_password, FKuser_role
        FROM users 
        WHERE user_email = :username';
$sth = $dbh->prepare(
    $sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':username' => $_POST['email']));

if ($rsUser = $sth->fetch(PDO::FETCH_ASSOC)){
    $storedhash = $rsUser['user_password'];
    if (password_verify($inputpassword, $storedhash)) {
        $_SESSION['role'] = $rsUser['FKuser_role'];
        $_SESSION['Userid'] = $rsUser['user_id'];
        $_SESSION['User_Name'] = $rsUser['user_firstname'];
        header('Location: ../../Webshop/index.php?page=main');
    }
    else {
        $_SESSION['AlertWrongPassword'] = 'true';
        header('Location: ../../Webshop/index.php?page=login');
    }
}
else {
    $_SESSION['AlertNoEmail'] = 'true';
    header('Location: ../../Webshop/index.php?page=main');
}

