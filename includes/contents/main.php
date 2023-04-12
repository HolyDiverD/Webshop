<?php
if (isset($_SESSION['Customer_order_success'])) {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Product was successfully ordered!"); } 
</script>';
    unset($_SESSION['Customer_order_success']);
}
if (isset($_SESSION['Guest_order_success'])) {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Product was successfully ordered!"); } 
</script>';
    unset($_SESSION['Guest_order_success']);
}

?>
<div class="pagelogo">
    <img src="https://www.nicepng.com/png/detail/718-7189369_v-d-logo-png-transparent.png"
         alt="V&d Logo Png Transparent@nicepng.com">
</div>
