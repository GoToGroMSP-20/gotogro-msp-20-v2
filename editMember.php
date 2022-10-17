<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./styles/styles.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="assets/icons/SiOverleaf.svg" type="image/icon" />
    <title>GoToGro | Edit Member</title>
</head>

<body>
    <!-- Success dialog -->
    <dialog class="success" id="success">
        <div class="dialogContent">
            <div class="popup-status">
                <?php echo file_get_contents("./assets/icons/FaCheckCircle.svg"); ?>
                <p>Edit successful</p>
            </div>
            <div class="dialogButtons">
                <button class="button" onclick="location.href = 'memberInfo.php';" buttonType="secondary" type="submit"
                    name="submit">Search a Member</button>
                <button class="button" onclick="location.href = 'index.php';" buttonType="primary" type="submit"
                    name="submit">Add an Order</button>
            </div>
        </div>
    </dialog>

    <!-- Error dialog -->
    <dialog class="error" id="error">
        <div class="popup-status">
            <?php echo file_get_contents("./assets/icons/FaTimesCircle.svg"); ?>
            <p>Unable to Edit Member. Something broke from our end, please contact our technicians for support. (Error:
                500)</p>
            <button class="button" onclick="location.href = 'addMember.php';" buttonType="primary" type="submit"
                name="submit">Back to Add Member</button>
        </div>
    </dialog>
    
    <!-- Display dialog accordingly -->
    <?php
    if (isset($_GET['member']) && !empty($_GET["member"])) {
        $member = $_GET['member'];
        //echo $member;
        if ($member == "empty" ||  $member == "invalid" ||  $member == "invalid_query" ||  $member == "connection_failure" ||  $member == "invalid_id" || $member == "invalid_member_id") {
            echo "<script>document.getElementById('error').showModal();</script>";
        } else if ($member == "success") {
            echo "<script>document.getElementById('success').showModal();</script>";
        }
    }
    ?>

    <!-- Display member details for editing -->
    <?php
        if (isset($_GET["member_id"]) && !empty($_GET["member_id"])) {
            require_once("settings.php");
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
            if (!$conn) {
                echo "<script>document.getElementById('error').showModal();</script>";
                exit();
            } else {
                $member_id = $_GET["member_id"];
                $user_query =  "SELECT * FROM member WHERE member_id = '$member_id'";

                $user_result = mysqli_query($conn, $user_query);
                if (!$user_result) {
                    echo "<script>document.getElementById('error').showModal();</script>";
                    exit();
                } else if (mysqli_num_rows($user_result) == 0) {
                    echo "<script>document.getElementById('error').showModal();</script>";
                    exit();
                } else {
                    $row = mysqli_fetch_assoc($user_result);
                }
            }
        }
    ?>
    
    <?php include_once("navbar.inc"); ?>
    <main>
        <div class="editMember" id="editMember">
            <a class="back-item" onclick="window.history.go(-1); return false;">
                <?php echo file_get_contents("./assets/icons/FiArrowLeft.svg"); ?> Member Details
            </a>
            <form method="post" action="updateMEMBER.php" class="editMemberform">
                <div class="editFormInput">
                    <h3>Edit Member Form</h3>
                </div>

                <div class="editFormInput">
                    <label for="firstname" id="fName">First Name</label>
                    <?php echo"<input type='text' pattern='[a-zA-Z]{2,20}' id='firstname' name='firstname' required value={$row['firstName']} />" ?>
                </div>

                <div class="editFormInput">
                    <label for="lastname" id="lName">Last Name</label>
                    <?php echo"<input type='text' pattern='[a-zA-Z]{2,20}' id='lastname' name='lastname' required value={$row['lastName']} />" ?>
                </div>

                <div class="editFormInput">
                    <label for="DateofBirth" id="dob">Date of Birth</label>
                    <?php echo"<input type='date' min='1900-01-01' max='2100-01-01' name='dateofbirth' id='dateofbirth' required value={$row['dob']} />" ?>
                </div>

                <div class="editFormInput">
                    <label for="email" id="em">Email</label>
                    <?php echo"<input type='email' id='email' name='email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$' value={$row['email']} required />" ?>
                </div>

                <div class="editFormInput">
                    <label for="phonenum" id="mobilenum">Mobile Number (Optional)</label>
                    <?php echo"<input type='tel' name='phonenum' id='phonenum' maxlength='10' pattern='[\d]{10}' placeholder='For eg. 0400000000' value={$row['mobile']} />" ?>

                    <!-- Temp MEMBER ID -->
                    <?php echo"<input type='hidden' name='member_id' id='member_id' value={$row['member_id']} />" ?>

                </div>
                <div class="editMemberButtons">
                    <button class="button" id=button2 buttonType="secondary" type="reset" name="cancel" onclick="window.history.go(-1); return false;">Cancel</button>
                    <button class="button" id=button1 buttonType="primary" type="submit" name="submit">Save Details</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>