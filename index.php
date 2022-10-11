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
    <div class="addorder">
        <h1 class="white-text">Add New Order</h1>
        <form method="post" action="processORDER.php" id="form" id="apply">
            <div id="row_1">
                <div class="inputField">
                    <label for="product_ID1">Product ID</label>
                    <select name="product_ID1" id="product_ID1">
                        <option value="placeholder" hidden>Please Select</option>
                        <option value="Milk">Milk</option>
                        <option value="KitKat">KitKat</option>
                        <option value="Milo">Milo</option>
                        <option value="Cheese">Cheese</option>
                        <option value="Ice Cream">Ice Cream</option>
                    </select>
                </div>
                <div class="inputField">
                    <label for="quantity1">Quantity </label>
                    <input type="number" min="1" max="100" name="quantity1" id="quantity1" required="required" onblur="show_total()" />
                </div>
                <div class="inputField">
                    <label for="price1">Price </label>
                    <input type="number" min="1" max="100" name="price1" id="price1" required="required" onblur="show_total();" />
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
                    <label for="product_ID2">Product ID</label>
                    <select name="product_ID2" id="product_ID2">
                        <option value="placeholder" hidden>Please Select</option>
                        <option value="Milk">Milk</option>
                        <option value="KitKat">KitKat</option>
                        <option value="Milo">Milo</option>
                        <option value="Cheese">Cheese</option>
                        <option value="Ice Cream">Ice Cream</option>
                    </select>
                </div>
                <div class="inputField">
                    <label for="quantity2">Quantity </label>
                    <input type="number" min="1" max="100" name="quantity2" id="quantity2" onblur="show_total()" />
                </div>
                <div class="inputField">
                    <label for="price2">Price </label>
                    <input type="number" min="1" max="100" name="price2" id="price2" onblur="show_total()" />
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
                    <input type="text" name="member_id" minlength="10" placeholder=" Enter member's email or mobile number" id="member_id" required="required" />
                    <span id=member_error></span>
                    <br>
                </div>
            </div>
            <div class="inputField">
                <button class="button" buttonType="primary" type="submit" name="submit" onclick="validate()">Add
                    Order</button>
                <br>
            </div>
        </form>
</body>
<?php
if (isset($_GET['member_id']) && !empty($_GET["member_id"])) {
    $member_id = $_GET['member_id'];
    //echo $member_id;
    if ($member_id == "empty" ||  $member_id == "invalid") {
        echo "<script>document.getElementById('row_3').classList.add('invalid');
        document.getElementById('member_error').innerText = 'Invalid Member ID';</script>";
    } else if ($member_id == "valid") {
        echo "<script>document.getElementById('row_3').classList.add('valid');
        document.getElementById('member_error').innerText = 'Valid Member ID';</script>";
    }
}
?>

</html>