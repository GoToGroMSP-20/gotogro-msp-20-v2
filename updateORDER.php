<?php
function sanitise_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["submit"])) {

    $productid = sanitise_input($_POST["product_id"]);
    $orderid = sanitise_input($_POST["order_id"]);
    $quantity = sanitise_input($_POST["quantity"]);

    require_once("settings.php"); // DB connection info

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    // check if connection is successful
    if (!$conn) {
        // Display error msg
        echo "<p>Database connection failure </p>";
        header("location: editOrder.php?order=connection_failure");
        exit();
    } else {
        $query = "UPDATE TransactionOrder SET quantity = '$quantity' WHERE transaction_id = $orderid AND product_id = $productid;";

        $insert_result = mysqli_query($conn, $query);

        // checks if the execution was successful
        if (!$insert_result) {
            echo "<p>Something is wrong with ", $query, "</p>";
            header("location: editOrder.php?order=invalid_query");
            exit();
        }
        // close the database connection
        mysqli_close($conn);
    }
    header("location: editOrder.php?order=success");
    exit();
} else {
    header("location: editOrder.php");
    exit();
}