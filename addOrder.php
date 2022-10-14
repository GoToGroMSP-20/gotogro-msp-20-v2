<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="scripts/addorder.js"></script>
    <link rel="icon" href="assets/icons/SiOverleaf.svg" type="image/icon" />
    <title>GoToGro | Add Order</title>
</head>

<body>
    <?php
    include_once("navbar.inc");
    ?>
    <div class="addorder" id="addorder">
        <h1 class="white-text">Add New Order</h1>
        <form method="post" action="processORDER.php" id="form" id="apply" novalidate="novalidate">
            <div id="row_1">
                <div class="inputField">
                    <label for="product_ID1">Product Name</label>
                    <select name="product_ID1" id="product_ID1">
                        <option value="placeholder" hidden>Please Select</option>
                        <option value="1">Cheese</option>
                        <option value="11">Milk</option>
                        <option value="21">Cereal</option>
                        <option value="31">Ice Cream</option>
                    </select>
                </div>
                <div class="inputField">
                    <label for="quantity1">Quantity </label>
                    <input type="number" min="1" max="100" name="quantity1" id="quantity1" required="required"
                        onblur="show_total()" />
                </div>
                <div class="inputField">
                    <!-- <label for="price1">Price </label> -->
                    <select hidden name="price1" id="price1" onblur="show_total();">
                        <option value="placeholder" hidden>Please Select</option>
                        <option value="2">$2.0</option>
                        <option value="4">$4.0</option>
                        <option value="6">$6.0</option>
                        <option value="8">$8.0</option>
                    </select>
                    <br>
                </div>
                <div class="inputField">
                    <label>Amount </label>
                    <label id="amount1">$0.00</label>
                    <br>
                </div>
            </div>
            <div id="row_2">
                <div class="inputField">
                    <label for="product_ID2">Product Name</label>
                    <select name="product_ID2" id="product_ID2">
                        <option value="placeholder" hidden>Please Select</option>
                        <option value="1">Cheese</option>
                        <option value="11">Milk</option>
                        <option value="21">Cereal</option>
                        <option value="31">Ice Cream</option>
                    </select>
                </div>
                <div class="inputField">
                    <label for="quantity2">Quantity </label>
                    <input type="number" min="1" max="100" name="quantity2" id="quantity2" onblur="show_total()" />
                </div>
                <div class="inputField">
                    <!-- <label for="price2">Price </label> -->
                    <select hidden name="price2" id="price2" onblur="show_total()">
                        <option value="placeholder" hidden>Please Select</option>
                        <option value="2">$2.0</option>
                        <option value="4">$4.0</option>
                        <option value="6">$6.0</option>
                        <option value="8">$8.0</option>
                    </select>
                    <br>
                </div>
                <div class="inputField">
                    <label>Amount </label>
                    <label id="amount2">$0.00</label>
                    <br>
                </div>
            </div>
            <div id="row_3">
                <div class="inputField">
                    <label id="total_price"></label>
                    <br>
                    <label for="member_id">Member ID</label>
                    <input type="text" name="member_id" minlength="10" placeholder=" Enter member's email"
                        id="member_id" required="required" />
                    <span id=member_error></span>
                    <br>
                </div>
            </div>
            <div class="inputField">
                <button class="button" id="addordersubmit" buttonType="primary" type="submit" name="submit">Add
                    Order</button>
                <br>
            </div>
        </form>
        <!-- Success dialog -->
        <dialog class="success" id="success">
            <div class="popup-status">
                <?php echo file_get_contents("./assets/icons/FaCheckCircle.svg"); ?>
                <p>Submission successful</p>
            </div>
            <button class="button" onclick="location.href = 'addOrder.php';" buttonType="primary" type="submit"
                name="submit">Add another order</button>
        </dialog>

        <!-- Error dialog -->
        <dialog class="error" id="error">
            <div class="popup-status">
                <?php echo file_get_contents("./assets/icons/FaTimesCircle.svg"); ?>
                <p>Oops! Something broke from our end. Please contact our technicians for support (Error code: 500)</p>
            </div>
            <button class="button" onclick="location.href = 'addOrder.php';" buttonType="primary" type="submit"
                name="submit">Back to Add Order</button>
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