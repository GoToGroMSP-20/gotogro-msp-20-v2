<?php
    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if (isset($_POST["submit"])){
        
        if (isset ($_POST["member_id"]) && !empty ($_POST["member_id"])){
            $member_id = $_POST["member_id"];
            $member_id = sanitise_input($member_id);
            //echo "<p> Member ID : $member_id</p>";
            if ((!preg_match("/^[\d]{10}$/",$member_id)) && (!filter_var($member_id, FILTER_VALIDATE_EMAIL))) {
                header ("location: index.php?member_id=invalid");
                exit();
            }
            //require_once ("settings.php"); // DB connection info

            $conn = @mysqli_connect($host,$user,$pwd,$sql_db);
            // check if connection is successful
            if (!$conn){
                // Display error msg
                echo "<p>Database connection failure </p>";
                header ("location: index.php");
                exit();
            }else{
                $query = "INSERT INTO Transaction (transaction_id, member_id, date_purchased) VALUES('$transaction_id','$gname','$fname');";

                $insert_result = mysqli_query($conn, $query);
                $last_id = $conn->insert_id;

                // checks if the execution was successful
                if (!$insert_result){
                echo "<p>Something is wrong with ", $query,"</p>";
                header ("location: index.php");
                exit ();
                }
                // close the database connection
                mysqli_close($conn);
            }
            header ("location: index.php?form=$last_id");
            exit();

        }else{
            header ("location: index.php?member_id=empty");
            exit();
        }
    }else{
        header ("location: index.php");
        exit();
    }    
    
?>