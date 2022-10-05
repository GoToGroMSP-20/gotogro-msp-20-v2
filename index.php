<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS & Js Sheets -->
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="scripts/addorder.js"></script>
    <!-- <link rel="icon" href="./assets/icons/SiOverleaf.svg" type="image/icon" />-->
    <title>GoToGro | Add Order</title>
</head>

<body>
    <?php
  // NAV BAR
  //include_once ("navbar.inc");
  ?>
    <div className="addorder">
        <h1 className="white-text">Add New Order</h1>
        <form method="post" action="processORDER.php" novalidate="novalidate">
            <div class="inputField" id="row_1">
                <label for="product_ID">Product ID</label>
                <select name="product_ID" id="product_ID">
                    <option value="placeholder" hidden>Please Select</option>
                    <option value="Milk">Milk</option>
                    <option value="KitKat">KitKat</option>
                    <option value="Milo">Milo</option>
                    <option value="Cheese">Cheese</option>
                    <option value="Ice Cream">Ice Cream</option>
                </select>
            </div>
            <div class="inputField">
                <label for="quantity">Quantity </label>
                <input type="number" name="quantity" id="quantity1" required="required" onblur="show_total()" />
            </div>
            <div class="inputField">
                <label for="price">Price </label>
                <input type="number" name="price" id="price1" required="required" onblur="show_total(); show_row2();" />
                <br>
            </div>
            <div id="row_2">
                <div class="inputField">
                    <label for="product_ID">Product ID</label>
                    <select name="product_ID" id="product_ID">
                        <option value="placeholder" hidden>Please Select</option>
                        <option value="Milk">Milk</option>
                        <option value="KitKat">KitKat</option>
                        <option value="Milo">Milo</option>
                        <option value="Cheese">Cheese</option>
                        <option value="Ice Cream">Ice Cream</option>
                    </select>
                </div>
                <div class="inputField">
                    <label for="quantity">Quantity </label>
                    <input type="number" name="quantity" id="quantity2" onblur="show_total()" />
                </div>
                <div class="inputField">
                    <label for="price">Price </label>
                    <input type="number" name="price" id="price2" onblur="show_total()" />
                    <br>
                </div>
            </div>
            <div class="inputField" id="row_3">
                <br>
                <label for="member_id">Member ID / Email </label>
                <input type="text" name="member_id" placeholder=" " id="member_id" required="required" />
                <br>
            </div>
            <div class="inputField">
                <label id="total_price"></label></P><br>
                <button class="button" buttonType="primary" type="submit" name="submit">Add Order</button>
                <br>
            </div>
        </form>
</body>

</html>