<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
    <!-- <script type="text/javascript" src="scripts/editorder.js"></script> -->
    <link rel="icon" href="assets/icons/SiOverleaf.svg" type="image/icon" />
    <title>GoToGro | Edit Order</title>
</head>

<body>
    <?php
    include_once("navbar.inc");
    ?>
    <div class="ordersummary" id="ordersummary">
        <div>
            <a class="back-item" href="/memberDetails.php">
                <?php echo file_get_contents("./assets/icons/FiArrowLeft.svg"); ?> Go Back
            </a>
        </div>

        // Used for Passing Data to Other Pages-----------------------------------
        // Need to add productid, name, price, quantity for Edit Order to work ---

        let orderid = 161;
        let productid = 31;
        let name = "Ice Cream";
        let price = 8.0;
        let quantity = 10;
        storeDetails(orderid, productid, name, price, quantity);

        ---------------------------------------------------------------------------

        function storeDetails(orderid, productid, name, price, quantity) {
        sessionStorage.orderid = orderid;
        sessionStorage.orderid = orderid;
        sessionStorage.productid = productid;
        sessionStorage.name = name;
        sessionStorage.price = price;
        sessionStorage.quantity = quantity;

        /*alert("orderid: " + sessionStorage.orderid + " \n" +
        "productid: " + sessionStorage.productid + " \n" +
        "name: " + sessionStorage.name + " \n" +
        "price: " + sessionStorage.price + " \n" +
        "quantity: " + sessionStorage.quantity);*/
        }

        //------------------------------------------------------------------------

        <!-- Success dialog -->
        <dialog class="success" id="success">
            <div class="popup-status">
                <?php echo file_get_contents("./assets/icons/FaCheckCircle.svg"); ?>
                <p>Submission successful</p>
            </div>
            <button class="button" onclick="location.href = 'memberDetails.php';" buttonType="primary" type="submit"
                name="submit">Back to Member Details</button>
        </dialog>

        <!-- Error dialog -->
        <dialog class="error" id="error">
            <div class="popup-status">
                <?php echo file_get_contents("./assets/icons/FaTimesCircle.svg"); ?>
                <p>Oops! Something broke from our end. Please contact our technicians for support (Error code: 500)</p>
            </div>
            <button class="button" onclick="location.href = 'memberDetails.php';" buttonType="primary" type="submit"
                name="submit">Back to Member Details</button>
        </dialog>
</body>
<?php

if (isset($_GET['order']) && !empty($_GET["order"])) {
    $order = $_GET['order'];
    //echo $order;
    if ($order == "empty" ||  $order == "invalid" ||  $order == "invalid_query" ||  $order == "connection_failure" ||  $order == "invalid_id" || $order == "invalid_member_id") {
        echo "<script>document.getElementById('error').classList.add('show');</script>";
    } else if ($order == "success") {
        echo "<script>document.getElementById('success').classList.add('show');</script>";
    }
}
?>
<script type="text/javascript" src="/scripts/navbar.js"></script>

</html>