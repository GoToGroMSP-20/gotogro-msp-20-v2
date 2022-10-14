<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="assets/icons/SiOverleaf.svg" type="image/icon" />
    <title>GoToGro | Order Summary </title>
</head>

<body>

    <!-- Error dialog -->
    <dialog class="error">
        <div class="popup-status">
            <?php echo file_get_contents("./assets/icons/FaTimesCircle.svg"); ?>
            <p>Oops! Something broke from our end. Please contact our technicians for support (Error code: 500)</p>
            <button class="button" onclick="location.href = 'index.php';" buttonType="primary" type="submit" name="submit">Back to Add Order</button>
        </div>
    </dialog>


    <?php include_once("navbar.inc");?>
    <?php
        require_once("settings.php"); 
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if(!$conn) {
            echo "<script type='text/javascript' src='./scripts/salesreportdialog.js'></script>";
            exit();
        } else {
            $user_query = "SELECT t.date_purchased, p.name, o.quantity, p.price, (o.quantity * p.price) AS amount
                           FROM product p
                           INNER JOIN transactionorder o
                           ON p.product_id = o.product_id
                           INNER JOIN transaction t 
                           ON o.transaction_id = t.transaction_id
                           WHERE t.transaction_id = 291
                           ORDER BY p.name";
            $user_result = mysqli_query($conn, $user_query);     
            if(!$user_result) {
                echo "<script type='text/javascript' src='./scripts/salesreportdialog.js'></script>";
                exit();
            } else if(mysqli_num_rows($user_result) == 0) {
                echo "<script type='text/javascript' src='./scripts/salesreportdialog.js'></script>";
                exit();
            } else {
                $query_result = mysqli_fetch_all($user_result, MYSQLI_ASSOC);
            }   
            $user_query2 = "SELECT o.transaction_id, SUM(o.quantity * p.price) AS totalPrice
                            FROM product p
                            INNER JOIN transactionorder o
                            ON p.product_id = o.product_id
                            WHERE o.transaction_id = 291
                            GROUP BY o.transaction_id";
            $user_result2 = mysqli_query($conn, $user_query2); 
            if(!$user_result2) {
                echo "<script type='text/javascript' src='./scripts/salesreportdialog.js'></script>";
                exit();
            } else if(mysqli_num_rows($user_result2) == 0) {
                echo "<script type='text/javascript' src='./scripts/salesreportdialog.js'></script>";
                exit();
            } else {
                $query_result2 = mysqli_fetch_assoc($user_result2);
            }  
        }
    ?>
    <main>
        <div class="orderSummary" id="orderSummary">
            <a class="back-item" href="/memberDetails.php">
                <?php echo file_get_contents("./assets/icons/FiArrowLeft.svg"); ?> Member Details
            </a>
            <div>
                <h1>Order <?php echo "291" ?></h1>
                <div>
                    <p class="purchasedOn">Purchased on</p>
                    <?php echo "<p>{$query_result[0]['date_purchased']}</p>" ?>
                </div>
            </div>
            <div>
                <h3>Order Summary</h3>
                <?php echo             
                    "<table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>QTY</th>
                                <th>Unit Price</th>
                                <th>Amount</th>
                                <th>Actions</th>
                            </tr>
                        </thead>           
                        <tbody>";
                    foreach ( $query_result as $row ):
                        echo "<tr>
                                <td>{$row['name']}</td>
                                <td>{$row['quantity']}</td>
                                <td>{$row['price']}</td>
                                <td>{$row['amount']}</td>
                                <td>Edit</td>
                            </tr>\n";
                    endforeach;
                    echo 
                    "   </tbody>
                    </table>";
                ?>
            </div>
            <div class="totalPriceDetails">
                <h3>Total Price</h3>
                <h2>$<?php echo "{$query_result2['totalPrice']}" ?></h2>
            </div>
            <?php mysqli_close($conn);?>
        </div>
    </main>
</body>

<script type="text/javascript" src="/scripts/navbar.js"></script>

</html>