<?php

if($_SESSION['role'] == ''){ ?>

    <div class="Ordercontainer"> Enter your information to finish creating your order.</div>

<div class="Logincontainer">
    <form action="../../Webshop/index.php?page=invoice" method="post" id="order">

        <label for="firstname"><b>Firstname</b></label>
        <input type="text" name="firstname" required>

        <label for="lastname"><b>Lastname</b></label>
        <input type="text" name="lastname" required>

        <label for="residence"><b>Residence</b></label>
        <input type="text" name="residence" required>

        <label for="street"><b>Street</b></label>
        <input type="text" name="street" required>

        <label for="housenumber"><b>Housenumber</b></label>
        <input type="text" name="housenumber" required>

        <label for="postalcode"><b>Postalcode</b></label>
        <input type="text" name="postalcode" required>

        <label for="email"><b>Email</b></label>
        <input type="email" name="email" required>

    </form>
    <button class="loginsubmit" type="submit" form="order"
            onclick="return confirm('Are you sure you want to submit this info?');">Enter
    </button>

</div>

<?php

}
if($_SESSION['role'] == '1'){

try{
    $sth = $dbh->prepare("
    SELECT * FROM users 
             WHERE user_id = :user
    ", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $sth->execute([
            'user' => $_SESSION['Userid']
    ]);
    $row = $sth->fetch(PDO::FETCH_OBJ);

}catch(PDOException $exception){
    $exception->getMessage();
}


?>
<div class="Ordercontainer"> Enter your information to finish creating your order.</div>

<div class="Logincontainer">
    <form action="../../Webshop/index.php?page=invoice" method="post" id="order">

        <label for="firstname"><b>Firstname</b></label>
        <input type="text" name="firstname" value="<?= $row->user_firstname ?>" required>

        <label for="lastname"><b>Lastname</b></label>
        <input type="text" name="lastname" value="<?= $row->user_lastname ?>" required>

        <label for="residence"><b>Residence</b></label>
        <input type="text" name="residence" value="<?= $row->user_residence ?>" required>

        <label for="street"><b>Street</b></label>
        <input type="text" name="street" value="<?= $row->user_street ?>" required>

        <label for="housenumber"><b>Housenumber</b></label>
        <input type="text" name="housenumber" value="<?= $row->user_housenumber ?>" required>

        <label for="postalcode"><b>Postalcode</b></label>
        <input type="text" name="postalcode" value="<?= $row->user_postalcode ?>" required>

        <label for="email"><b>Email</b></label>
        <input type="email" name="email" value="<?= $row->user_email ?>" required>

    </form>
    <button class="loginsubmit" type="submit" form="order"
            onclick="return confirm('Are you sure you want to submit this info?');">Enter
    </button>

</div>

<?php } ?>