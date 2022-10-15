<!DOCTYPE html>
<html lang="en">

    <head>
        <link href="./styles/styles.css" rel="stylesheet" type="text/css" />
        <link rel="icon" href="assets/icons/SiOverleaf.svg" type="image/icon" />
        <title>GoToGro | Display Member Details</title>
    </head>

    <body>
        <?php
            if (isset($_GET["member_id"]) && !empty($_GET["member_id"])) {
                require_once("settings.php");
                $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
                if (!$conn) {
                    echo "<script type='text/javascript' src='./scripts/salesreportdialog.js'></script>";
                    exit();
                } else {
                    $member_id = $_GET["member_id"];
                    $user_query =  "SELECT * FROM member WHERE member_id = '$member_id'";

                    $user_result = mysqli_query($conn, $user_query);
                    if (!$user_result) {
                        echo "<script type='text/javascript' src='./scripts/salesreportdialog.js'></script>";
                        exit();
                    } else if (mysqli_num_rows($user_result) == 0) {
                        echo "<script type='text/javascript' src='./scripts/salesreportdialog.js'></script>";
                        exit();
                    } else {
                        $row = mysqli_fetch_assoc($user_result);
                    }
                }
            }
        ?>

        <?php include_once("navbar.inc"); ?>
        <main>
            <form method="get" action="searchMEMBER.php" class="memberDetailsform">
                <?php echo "<h1>{$row['firstName']} {$row['lastName']}</h1>" ?>
                <h3>Member Details</h3>
                <div class="memberDetailsContainer">
                    <div class="memberDetails">
                        <div class="detail">
                            <b><label for="memberID" id="memberid">Member ID</label></b>
                            <?php echo "<p>{$row['member_id']}</p>" ?>
                        </div>

                        <div class="detail">
                            <b><label for="email" id="em">Email</label></b>
                            <?php echo "<p>{$row['email']}</p>" ?>
                        </div>
                    </div>
                    <div class="memberDetails">
                        <div class="detail">
                            <b><label for="DateofBirth" id="dob">Date of Birth</label></b>
                            <?php echo "<p>{$row['dob']}</p>" ?>
                        </div>

                        <div class="detail">
                            <b><label for="phonenum" id="mobilenum">Mobile Number</label></b>
                            <?php echo "<p>{$row['mobile']}</p>" ?>
                            <input type="hidden" name="member_id" id="member_id" value="1" />
                        </div>
                    </div>
                </div>

                <div class="buttons">
                    <button class="button" buttonType="error" type="reset" name="delete">Delete Member</button>
                    <button class="button" buttonType="primary" type="submit" name="edit">Edit Details</button>
                </div>

            </form>
            <div class="transactionHistory">
            <h3 class="orderHistory">Order History</h3>
            <?php
                if (isset($_GET["member_id"]) && !empty($_GET["member_id"])) {
                    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
                    if (!$conn) {
                        echo "<script type='text/javascript' src='./scripts/salesreportdialog.js'></script>";
                        exit();
                    } else {
                        $member_id = $_GET["member_id"];
                        $user_query = "SELECT t.transaction_id, (SUM(o.quantity) * p.price) AS totalPrice, t.date_purchased
                                    FROM product p
                                    INNER JOIN transactionorder o
                                    ON p.product_id = o.product_id
                                    INNER JOIN transaction t
                                    ON o.transaction_id = t.transaction_id
                                    WHERE member_id = '$member_id'
                                    GROUP BY t.transaction_id
                                    ORDER BY t.date_purchased";

                        $user_result = mysqli_query($conn, $user_query);
                        if (!$user_result) {
                            echo "<script type='text/javascript' src='./scripts/salesreportdialog.js'></script>";
                            exit();
                        } else if (mysqli_num_rows($user_result) == 0) {
                            echo "<script type='text/javascript' src='./scripts/salesreportdialog.js'></script>";
                            exit();
                        } else {
                            echo
                            "<table>
                                <thead>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Date Purchased</th>
                                        <th>Price Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                while ( $row = mysqli_fetch_assoc($user_result) ){
                                    echo
                                    "<tr>
                                        <td>{$row['transaction_id']}</td>
                                        <td>{$row['date_purchased']}</td>
                                        <td>\${$row['totalPrice']}</td>
                                        <td><a class='viewLink' href='orderHistory.php?transaction_id={$row['transaction_id']}'>View</a></td>
                                    </tr>\n";
                                }
                            echo
                            "   </tbody>
                            </table>";
                        }
                    }
                }
            ?>
            </div>
        </main>
    </body>
    <script type="text/javascript" src="/scripts/navbar.js"></script>

</html>