<?php
session_start();
require '../../../private/conn_Webshop.php';

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$residence = $_POST["residence"];
$street = $_POST["street"];
$housenumber = $_POST["housenumber"];
$postalcode = $_POST["postalcode"];
$email = $_POST["email"];
$password = $_POST["password"];
$repeatpass = $_POST["rpassword"];
$hash = password_hash($password, PASSWORD_DEFAULT);

try {
    $stmt = $dbh->prepare("
             SELECT * 
             FROM users 
             WHERE user_email = :useremail",
        array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->execute([
        ':useremail' => $email
    ]);

    if ($stmt->rowcount() > 0) {
        $_SESSION['SameEmail'] = 'true';
        header('Location: ../../Webshop/index.php?page=register');
    } else {
        try {
            if ($password == $repeatpass &&
                strlen($password) >= 15 &&
                $firstname != '' &&
                $lastname != '' &&
                $residence != '' &&
                $street != '' &&
                $housenumber != '' &&
                $postalcode != '' &&
                (strlen($postalcode)) == 6 &&
                $email != '' &&
                $password != '' &&
                $repeatpass != '') {
                $sql = 'INSERT INTO users(
                   user_email,
                   user_password, 
                   FKuser_role, 
                   user_firstname, 
                   user_lastname, 
                   user_residence, 
                   user_street, 
                   user_housenumber,
                   user_postalcode) 
                   VALUES 
                 (:email, 
                  :password,
                  :Klant,
                  :firstname,
                  :lastname,
                  :residence,
                  :street,
                  :housenumber,
                  :postcode
                  )';

                $sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute([
                    ':email' => $email,
                    ':password' => $hash,
                    ':Klant' => '1',
                    ':firstname' => $firstname,
                    ':lastname' => $lastname,
                    ':residence' => $residence,
                    ':street' => $street,
                    ':housenumber' => $housenumber,
                    ':postcode' => $postalcode
                ]);
                header('Location: ../../Webshop/index.php?page=main');
            } else {
                $_SESSION['registeralert'] = 'true';
                header('Location: ../../Webshop/index.php?page=register');
            }
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }
} catch (PDOException $exception) {
    $exception->getMessage();
}











