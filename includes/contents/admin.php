<?php
$firstname = $_SESSION['User_Name'];
$lastname = $_SESSION['User_LastName'];

echo '
<div class="adminlogo">
    <img src="../../img/Screenshot%202023-03-07%20141918.png">
</div>
<div class="adminmain">
 Welcome ' . $firstname . ' ' . $lastname . '
 
</div>
'
?>

