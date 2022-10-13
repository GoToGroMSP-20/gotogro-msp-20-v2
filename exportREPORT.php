<?php
    require_once("settings.php"); // DB connection info

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    // check if connection is successful
    if (!$conn) {
        // Display error msg
        echo "<p>Database connection failure </p>";
        header("location: salesReport.php?connection=invalid");
        exit();
    } else {
        // Upon successful connection
        $export_query = "SELECT o.product_id, p.name, SUM(o.quantity) AS totalQuantity, p.price, (SUM(o.quantity) * p.price) AS totalPrice, t.date_purchased 
                        FROM product p
                        INNER JOIN transactionorder o
                        ON p.product_id = o.product_id
                        INNER JOIN transaction t 
                        ON o.transaction_id = t.transaction_id
                        -- Comment out the line below to Test selection of transactions for last 30 days
                        WHERE t.date_purchased > NOW() - INTERVAL 30 day 
                        GROUP BY o.product_id
                        ORDER BY o.product_id";
        $export_result = mysqli_query($conn, $export_query);
        // checks if the execution was successful
        if (!$export_result->num_rows > 0) {
            header("location: salesReport.php?data=null");
            exit();
        } else {
            $delimiter = ",";
            $filename = "salesReport.csv";
            
            // creates a file pointer
            $file = fopen("php://memory", "w");

            // set column headers
            $fields = array("Item ID", "Product Name", "Quantity", "Unit Price", "Price Total");
            fputcsv($file, $fields, $delimiter);

            // write each row of data into the file
            while($row = mysqli_fetch_assoc($export_result)){
                $lineData = array($row["product_id"], $row["name"], $row["totalQuantity"], $row["price"], $row["totalPrice"]);
                fputcsv($file, $lineData, $delimiter);
            }

            // move back to beginning of file
            fseek($file, 0);

            // trigger download file as .csv
            header("Content-Type: text/csv");
            header("Content-Disposition: attachment; filename=salesReport.csv");

            fpassthru($file);
        }
        // close the database connection
        mysqli_close($conn);
        exit();
    }
    header("location: salesReport.php");
    exit();
?>