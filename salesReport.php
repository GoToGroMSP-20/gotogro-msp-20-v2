<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./styles/styles.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="assets/icons/SiOverleaf.svg" type="image/icon" />
    <title>GoToGro | Sales Report</title>
</head>

<body>
    <?php include_once("navbar.inc"); ?>
    <main>
        <div class="salesReport">
            <h2>Sales Report</h2>
            <?php
                require_once("settings.php"); 
                $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
                if(!$conn) {
                    echo "<p class='errorMsg'>Database connection failure</p>";
                    exit();
                } else {
                    $sql_table = "MemberOrder";
                    $user_query =  "SELECT productName, SUM(quantity) AS totalQuantity, unitPrice, SUM(quantity * unitPrice) AS totalPrice, datePurchased 
                                    FROM $sql_table 
                                    WHERE datePurchased > NOW() - INTERVAL 30 day 
                                    GROUP BY productName
                                    ORDER BY productName";
                    $user_result = mysqli_query($conn, $user_query);       
                    if(!$user_result) {
                        echo "<p class='errorMsg'>Query error</p>";
                        exit();
                    } else if(mysqli_num_rows($user_result) == 0) {
                        echo "<p class='errorMsg'>No records found</p>";
                        exit();
                    } else {
                        echo             
                        "<table>
                            <thead>
                                <tr>
                                    <!-- <th>Item ID</th> -->
                                    <th>Product Name</th>
                                    <!-- <th>Category</th> -->
                                    <th>QTY</th>
                                    <th>Unit Price</th>
                                    <th>Price Total</th>
                                </tr>
                            </thead>           
                            <tbody>";
                        while ( $row = mysqli_fetch_assoc($user_result) ){
                            echo "<tr>
                                    <td>{$row['productName']}</td>
                                    <td>{$row['totalQuantity']}</td>
                                    <td>{$row['unitPrice']}</td>
                                    <td>{$row['totalPrice']}</td>
                                    </tr>\n";
                        }
                        echo 
                        "   </tbody>
                        </table>";
                    }                    
                }
            ?>
            <?php mysql_close($con);?>
            <button type="button">Export to</button>
        </div>
    </main>
</body>

<script type="text/javascript" src="/scripts/navbar.js"></script>

</html>


