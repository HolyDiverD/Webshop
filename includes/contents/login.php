<?php
?>
<div class="Logincontainer">
    <form action="../../actions/action/loginaction.php" method="post" id="Login">
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
    </form>
    <button class="loginsubmit" type="submit" form="Login"
            onclick="return confirm('Are you sure you want to submit this info?');">Login</button>
</div>