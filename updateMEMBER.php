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
    } else {
        header("location: editMember.php?member=empty");
        exit();
    }

    if (isset($_POST["firstname"]) && !empty($_POST["firstname"])) {
        $firstname = $_POST["firstname"];
        $firstname = sanitise_input($firstname);
        //echo "<p> First Name: $firstname</p>";
        if (!preg_match("/^[A-Za-z]{1,20}$/", $firstname)) {
            header("location: editMember.php?member=invalid");
            exit();
        }
    } else {
        header("location: editMember.php?member=empty");
        exit();
    }

    if (isset($_POST["lastname"]) && !empty($_POST["lastname"])) {
        $lastname = $_POST["lastname"];
        $lastname = sanitise_input($lastname);
        //echo "<p> Last Name: $lastname</p>";
        if (!preg_match("/^[A-Za-z]{1,20}$/", $lastname)) {
            header("location: editMember.php?member=invalid");
            exit();
        }
    } else {
        header("location: editMember.php?member=empty");
        exit();
    }
    if (isset($_POST["dateofbirth"]) && !empty($_POST["dateofbirth"])) {
        $dob = $_POST["dateofbirth"];
        $dob = sanitise_input($dob);
        //echo "<p> DOB: $dob</p>";
    } else {
        header("location: editMember.php?member=empty");
        exit();
    }
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        $email = $_POST["email"];
        $email = sanitise_input($email);
        //echo "<p> Email: $email</p>";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: editMember.php?member=invalid");
            exit();
        }
    } else {
        header("location: editMember.php?member=empty");
        exit();
    }
    if (isset($_POST["phonenum"]) && !empty($_POST["phonenum"])) {
        $phone = $_POST["phonenum"];
        $phone = sanitise_input($phone);
        //echo "<p> Phone No: $phone</p>";
        if (!preg_match("/^[\d]{10}$/", $phone)) {
            header("location: editMember.php?member=invalid");
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
        header("location: editMember.php?member=connection_failure");
        exit();
    } else {
        $user_query = "SELECT * FROM member WHERE member_id = '$member_id'";
        $user_result = mysqli_query($conn, $user_query);
        $row = mysqli_fetch_assoc($user_result);
        $memberId = $row["member_id"];
        echo "<p> DB member ID: $memberId</p>";
        // checks if the execution was successful
        if (!$row) {
            echo "<p class='manage_error'>Something is wrong with ", $query, "</p>";
            header("location: editMember.php?member=invalid_member_id");
            exit();
        } else {
            $query = "UPDATE member SET firstName = '$firstname',lastName = '$lastname',dob = '$dob',email = '$email',mobile = '$phone' WHERE member_id = '$memberId'";
            $insert_result = mysqli_query($conn, $query);

            // checks if the execution was successful
            if (!$insert_result) {
                echo "<p>Something is wrong with ", $query, "</p>";
                header("location: editMember.php?member=invalid_query");
                exit();
            }
        }
        // close the database connection
        mysqli_close($conn);
    }
    header("location: editMember.php?member_id={$row['member_id']}&member=success");
    exit();
} else {
    header("location: editMember.php");
    exit();
}