<?php
if (is_null($_SESSION['AlertWrongPassword'])){
    $_SESSION['AlertWrongPassword'] = '';
}
if (is_null($_SESSION['AlertNoEmail'])){
    $_SESSION['AlertNoEmail'] = '';
}

if ($_SESSION['AlertWrongPassword'] == 'true') {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Login failed, password is incorrect. Please try again."); } 
</script>';
}
if ($_SESSION['AlertNoEmail'] == 'true') {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Login failed, email does not exist. Please try again."); } 
</script>';
}

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