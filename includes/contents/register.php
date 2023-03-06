<?php
?>
<div class="Logincontainer">
    <form action="../../actions/action/registeraction.php" method="post" id="register">
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
        <input type="email" name="email"  required>

        <label for="password"><b>Password</b></label>
        <input type="password" name="password" required>

        <label for="rpassword"><b>Repeat password</b></label>
        <input type="password" name="rpassword" required>

    </form>
    <button class="loginsubmit" type="submit" form="register" onclick="return confirm('Are you sure you want to submit this info?');">Enter</button>

</div>
