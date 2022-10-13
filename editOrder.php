<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="scripts/editorder.js"></script>
    <link rel="icon" href="assets/icons/SiOverleaf.svg" type="image/icon" />
    <title>GoToGro | Edit Order</title>
</head>

<body>
    <?php
    include_once("navbar.inc");
    ?>
    <div class="editorder" id="editorder">
        <div>
            <a class="back-item" href="orderSummery.php">
                <?php echo file_get_contents("./assets/icons/FiArrowLeft.svg"); ?> Order Summary
            </a>
        </div>
        <h1>Edit Order Details</h1>
        <form method="post" action="updateORDER.php" id="form" id="apply" novalidate="novalidate">
            <div id="row_1">
                <div class="inputField">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" id="product_name" disabled>
                </div>
                <div class="inputField">
                    <label for="quantity">Quantity </label>
                    <input type="number" min="0" max="100" name="quantity" id="quantity" required="required"
                        onblur="show_total()" />
                </div>
                <div class="inputField">
                    <input type="hidden" name="price" id="price">
                    <br>
                </div>
                <div class="inputField">
                    <input type="hidden" name="product_id" id="product_id">
                    <br>
                </div>
                <div class="inputField">
                    <input type="hidden" name="order_id" id="order_id">
                    <br>
                </div>
                <div class="inputField">
                    <label>Amount </label>
                    <label id="amount">$0.00</label>
                    <br>
                </div>
            </div>
            <div id="row_3">
                <div>
                    <a class="button" id="editorderreset" buttonType="secondary" href="orderSummery.php">Cancel</a>
                    <button class="button" id="editordersubmit" buttonType="primary" type="submit" name="submit">Save
                        Details</button>
                    <br>
                </div>
            </div>
        </form>
        <!-- Success dialog -->
        <dialog class="success" id="success">
            <div class="popup-status">
                <?php echo file_get_contents("./assets/icons/FaCheckCircle.svg"); ?>
                <p>Submission successful</p>
            </div>
            <button class="button" onclick="location.href = 'orderSummery.php';" buttonType="primary" type="submit"
                name="submit">Back to Order Summary</button>
        </dialog>

        <!-- Error dialog -->
        <dialog class="error" id="error">
            <div class="popup-status">
                <?php echo file_get_contents("./assets/icons/FaTimesCircle.svg"); ?>
                <p>Oops! Something broke from our end. Please contact our technicians for support (Error code: 500)</p>
            </div>
            <button class="button" onclick="location.href = 'orderSummery.php';" buttonType="primary" type="submit"
                name="submit">Back to Order Summary</button>
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

</html>