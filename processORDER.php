<?php
function sanitise_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["submit"])) {

    if (isset($_POST["member_id"]) && !empty($_POST["member_id"])) {
        $member_id = $_POST["member_id"];
        $member_id = sanitise_input($member_id);
        //echo "<p> Member ID : $member_id</p>";
        if (!filter_var($member_id, FILTER_VALIDATE_EMAIL)) {
            header("location: addOrder.php?order=invalid_id");
            exit();
        }
        $product_ID1 = sanitise_input($_POST["product_ID1"]);
        $quantity1 = sanitise_input($_POST["quantity1"]);
        //$price1 = sanitise_input($_POST["price1"]);
        $date = date("Y/m/d");
        require_once("settings.php"); // DB connection info

        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        // check if connection is successful
        if (!$conn) {
            // Display error msg
            echo "<p>Database connection failure </p>";
            header("location: addOrder.php?order=connection_failure");
            exit();
        } else {
            $user_query = "SELECT * FROM member WHERE email = '$member_id'";
            $user_result = mysqli_query($conn, $user_query);
            $row = mysqli_fetch_assoc($user_result);
            $memberId = $row["member_id"];
            echo "<p> DB member ID: $memberId</p>";
            // checks if the execution was successful
            if (!$row) {
                echo "<p class='manage_error'>Something is wrong with ", $query, "</p>";
                header("location: addOrder.php?order=invalid_member_id");
                exit();
            } else {
                $query = "INSERT INTO Transaction (member_id, date_purchased) VALUES('$memberId','$date');";

                $insert_result = mysqli_query($conn, $query);
                $last_id = $conn->insert_id;

                // checks if the execution was successful
                if (!$insert_result) {
                    echo "<p>Something is wrong with ", $query, "</p>";
                    header("location: addOrder.php?order=invalid_queryT");
                    exit();
                } else {
                    $query = "INSERT INTO TransactionOrder (transaction_id, product_id, quantity ) VALUES('$last_id','$product_ID1', '$quantity1');";
                    $insert_result = mysqli_query($conn, $query);
                    // checks if the execution was successful
                    if (!$insert_result) {
                        echo "<p>Something is wrong with ", $query, "</p>";
                        header("location: addOrder.php?order=invalid_query");
                        exit();
                    }
                    if (isset($_POST["quantity2"]) && !empty($_POST["quantity2"])) {
                        $product_ID2 = sanitise_input($_POST["product_ID2"]);
                        $quantity2 = sanitise_input($_POST["quantity2"]);
                        $query = "INSERT INTO TransactionOrder (transaction_id, product_id, quantity ) VALUES('$last_id','$product_ID2', '$quantity2');";
                        $insert_result = mysqli_query($conn, $query);
                        // checks if the execution was successful
                        if (!$insert_result) {
                            echo "<p>Something is wrong with ", $query, "</p>";
                            header("location: addOrder.php?order=invalid_query");
                            exit();
                        }
                    }
                    if (isset($_POST["quantity3"]) && !empty($_POST["quantity3"])) {
                        $product_ID3 = sanitise_input($_POST["product_ID3"]);
                        $quantity3 = sanitise_input($_POST["quantity3"]);
                        $query = "INSERT INTO TransactionOrder (transaction_id, product_id, quantity ) VALUES('$last_id','$product_ID3', '$quantity3');";
                        $insert_result = mysqli_query($conn, $query);
                        // checks if the execution was successful
                        if (!$insert_result) {
                            echo "<p>Something is wrong with ", $query, "</p>";
                            header("location: addOrder.php?order=invalid_query");
                            exit();
                        }
                    }
                    if (isset($_POST["quantity4"]) && !empty($_POST["quantity4"])) {
                        $product_ID4 = sanitise_input($_POST["product_ID4"]);
                        $quantity4 = sanitise_input($_POST["quantity4"]);
                        $query = "INSERT INTO TransactionOrder (transaction_id, product_id, quantity ) VALUES('$last_id','$product_ID4', '$quantity4');";
                        $insert_result = mysqli_query($conn, $query);
                        // checks if the execution was successful
                        if (!$insert_result) {
                            echo "<p>Something is wrong with ", $query, "</p>";
                            header("location: addOrder.php?order=invalid_query");
                            exit();
                        }
                    }
                }
            }
            // close the database connection
            mysqli_close($conn);
        }
        header("location: addOrder.php?order=success");
        exit();
    } else {
        header("location: addOrder.php?order=empty");
        exit();
    }
} else {
    header("location: addOrder.php");
    exit();
}