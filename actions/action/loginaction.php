<?php
session_start();
require '../../../private/conn_Webshop.php';

$sql = "SELECT * FROM users WHERE user_email = ?";
$stmt = $dbh->prepare($sql);
$result = $stmt->execute([$_POST['email']]);
$users = $result->fetchAll();
if (isset($users[0])){
    if (password_verify($_POST['password'], $users[0]->password)) {
        echo'YIPPIE';
    } else {
        echo'DARN';
    }
} else {
}

/*if ($rsUser = $sth->fetch(PDO::FETCH_ASSOC)){
    if (($_POST['psw'] == $rsUser['user_psw'])) {
        $_SESSION['role'] = $rsUser['user_role'];
        $_SESSION['Userid'] = $rsUser['ID'];
        header('Location: ../../index.php?page=');
    }
    else {
        $_SESSION['role'] = 'null';
        header('Location: ../../index.php?page=login');
    }
}
else {
    $_SESSION['role'] = 'null';
    header('Location: ../../Webshop/index.php?page=login');
}*/
?>
