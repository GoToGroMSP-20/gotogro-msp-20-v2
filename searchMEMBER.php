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
            header("location: memberInfo.php?member_id=invalid");
            exit();
        }
        require_once("settings.php"); // DB connection info

        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        // check if connection is successful
        if (!$conn) {
            // Display error msg
            echo "<p>Database connection failure </p>";
            header("location: memberInfo.php?member_id=invalid");
            exit();
        } else {
            // Upon successful connection
            $user_query = "SELECT * FROM Member WHERE email = '$member_id';";
            $user_result = mysqli_query($conn, $user_query);
            $row = mysqli_fetch_assoc($user_result);
            // checks if the execution was successful
            if (!$row) {
                //echo User doesn't Exist
                echo "<p class='manage_error'>User doesn't Exist</p>";
                header("location: memberInfo.php?member_id=invalid_query");
                exit();
            }
            // close the database connection
            mysqli_close($conn);
        }
        header("location: memberDetails.php?member_id=". $row['member_id']);
        exit();
    } else {
        header("location: memberInfo.php?member_id=empty");
        exit();
    }
} else {
    header("location: memberInfo.php");
    exit();
}