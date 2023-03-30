<?php
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$residence = $_POST["residence"];
$street = $_POST["street"];
$housenumber = $_POST["housenumber"];
$postalcode = $_POST["postalcode"];
$email = $_POST["email"];


?>

<div class="Ordercontainer">
 <div class="Invoicecontainer">
     <p>Invoice to:</p>
     <p>Name: <?= $firstname?>  <?= $lastname?></p>
    <p>Email: <?= $email?></p>
 </div>
 <div class="Invoice_adress_container">
     <p>Delivery adress:</p>
     <p>Residence/City: <?= $residence?></p>
     <p>Street: <?= $street?></p>
     <p>Housenumber: <?= $housenumber?></p>
     <p>Postalcode: <?= $postalcode?></p>
 </div>
    <div class="product_edit_view">
        <table class="admintable" id=table>
            <button class="OrderCartBttn" onclick="location.href=''"
                    type="button">Order</button>
            <tr>
                <th>Name</th>
                <th>EAN</th>
                <th>Price</th>
                <th>Amount</th>
            </tr>
            <?php
            include 'actions/sa/invoice_sa.php';
            ?>
            <p> Total Price: <?= $_SESSION['Total_Cart_Price']?> </p>
        </table>

    </div>
</div>



