<?php
function sanitise_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["submit"])) {

    if (isset($_POST["fname"]) && !empty($_POST["fname"])) {
        $fname = $_POST["fname"];
        $fname = sanitise_input($fname);
        //echo "<p> First Name: $fname</p>";
        if (!preg_match("/^[A-Za-z]{1,20}$/", $fname)) {
            header("location: addMember.php?member=invalid");
            exit();
        }
    } else {
        header("location: addMember.php?member=empty");
        exit();
    }

    if (isset($_POST["lname"]) && !empty($_POST["lname"])) {
        $lname = $_POST["lname"];
        $lname = sanitise_input($lname);
        //echo "<p> Last Name: $lname</p>";
        if (!preg_match("/^[A-Za-z]{1,20}$/", $lname)) {
            header("location: addMember.php?member=invalid");
            exit();
        }
    } else {
        header("location: addMember.php?member=empty");
        exit();
    }
    if (isset($_POST["date"]) && !empty($_POST["date"])) {
        $dob = $_POST["date"];
        $dob = sanitise_input($dob);
        //echo "<p> DOB: $dob</p>";
    } else {
        header("location: addMember.php?member=empty");
        exit();
    }
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        $email = $_POST["email"];
        $email = sanitise_input($email);
        //echo "<p> Email: $email</p>";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: addMember.php?member=invalid");
            exit();
        }
    } else {
        header("location: addMember.php?member=empty");
        exit();
    }
    if (isset($_POST["mnumber"]) && !empty($_POST["mnumber"])) {
        $phone = $_POST["mnumber"];
        $phone = sanitise_input($phone);
        //echo "<p> Phone No: $phone</p>";
        if (!preg_match("/^[\d]{10}$/", $phone)) {
            header("location: addMember.php?member=invalid");
            exit();
        }
    } else {
        $phone = "";
    }

    require_once("settings.php"); // DB connection info

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    // check if connection is successful
    if (!$conn) {
        // Display error msg
        echo "<p>Database connection failure </p>";
        header("location: addMember.php?member=connection_failure");
        exit();
    } else {
        $query = "INSERT INTO Member (firstName,lastName, dob, email, mobile) VALUES('$fname','$lname','$dob','$email','$phone');";

        $insert_result = mysqli_query($conn, $query);
        $last_id = $conn->insert_id;

        // checks if the execution was successful
        if (!$insert_result) {
            echo "<p>Something is wrong with ", $query, "</p>";
            header("location: addMember.php?member=invalid_query");
            exit();
        }
        // close the database connection
        mysqli_close($conn);
    }
    header("location: addMember.php?member=success");
    exit();
} else {
    header("location: addMember.php");
    exit();
}