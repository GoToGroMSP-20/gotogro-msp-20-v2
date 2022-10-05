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
                header ("location: editMember.php?member_id=invalid");
                exit();
            }
            //require_once ("settings.php"); // DB connection info

            $conn = @mysqli_connect($host,$user,$pwd,$sql_db);
            // check if connection is successful
            if (!$conn){
                // Display error msg
                echo "<p>Database connection failure </p>";
                header ("location: editMember.php");
                exit();
            }else{
                // Upon successful connection
                $sql_table= "Member";
                $user_query = "SELECT * FROM $sql_table WHERE mobile = '$member_id' OR email = '$member_id'";
                $user_result = mysqli_query($conn, $user_query);
                $row = mysqli_fetch_assoc($user_result);
                // checks if the execution was successful
                if (!$row){
                    //echo User doesn't Exist
                    echo "<p class='manage_error'>User doesn't Exist</p>";
                    header ("location: editMember.php?member_id=valid");
                    exit ();
                } else {
                    //echo User Exist
                    echo "<p class='manage_error'>User does Exist</p>";
                    header ("location: editMember.php?member_id=invalid");
                    exit ();
                }
            }
            exit();

        }else{
            header ("location: editMember.php?member_id=empty");
            exit();
        }
    }else{
        header ("location: editMember.php");
        exit();
    }