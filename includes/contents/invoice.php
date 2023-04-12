<?php
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$residence = $_POST["residence"];
$street = $_POST["street"];
$housenumber = $_POST["housenumber"];
$postalcode = $_POST["postalcode"];
$email = $_POST["email"];


if ($firstname == '' &&
    $lastname == '' &&
    $residence == '' &&
    $street == '' &&
    $housenumber == '' &&
    $postalcode == '' &&
    $email == '')
{
    header('Location: ../Webshop/index.php?page=order');
}
else{
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

            <tr>
                <th>Name</th>
                <th>EAN</th>
                <th>Price</th>
                <th>Amount</th>
            </tr>
            <?php
            include 'actions/sa/invoice_sa.php';
            ?>

        </table>
        <p> Total Price: <?= $_SESSION['Total_Cart_Price']?> </p>
        <button class="OrderCartBttn" onclick="location.href='../../actions/action/order_action.php'"
                type="button">Order</button>

    </div>
</div>
<?php }


