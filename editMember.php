<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./styles/styles.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="scripts/editmember.js"></script>
    <link rel="icon" href="assets/icons/SiOverleaf.svg" type="image/icon" />
    <title>GoToGro | Edit Member</title>
</head>

<body>
    <?php
    include_once("navbar.inc");
    ?>
    <main>
        <form method="post" action="updateMEMBER.php" class="editMemberform">

            <div class="editFormInput">
                <h3>Edit Member Form</h3>
            </div>

            <div class="editFormInput">
                <label for="firstname" id="fName">First Name</label>
                <input type="text" pattern="[a-zA-Z]{2,20}" id="firstname" name="firstname" required />
            </div>

            <div class="editFormInput">
                <label for="lastname" id="lName">Last Name</label>
                <input type="text" pattern="[a-zA-Z]{2,20}" id="lastname" name="lastname" required />
            </div>

            <div class="editFormInput">
                <label for="DateofBirth" id="dob">Date of Birth</label>
                <input type="text" min='1900-01-01' max='2100-01-01' name="dateofbirth" id="dateofbirth" required
                    placeholder="YYYY-MM-DD" />
            </div>

            <div class="editFormInput">
                <label for="email" id="em">Email</label>
                <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
            </div>

            <div class="editFormInput">
                <label for="phonenum" id="mobilenum">Mobile Number (Optional)</label>
                <input type="tel" name="phonenum" id="phonenum" maxlength="10" pattern="[\d]{10}"
                    placeholder="For eg. 0400000000" />

                <!-- Temp MEMBER ID -->
                <input type="hidden" name="member_id" id="member_id" />

            </div>
            <div>
                <button class="button" id=button2 buttonType="secondary" type="reset" name="cancel">Cancel</button>
                <button class="button" id=button1 buttonType="primary" type="submit" name="submit">Save Details</button>
            </div>
        </form>
    </main>
    <!-- Success dialog -->
    <dialog class="success" id="success">
        <div class="popup-status">
            <?php echo file_get_contents("./assets/icons/FaCheckCircle.svg"); ?>
            <p>Edit successful</p>
        </div>
        <div class="SuccessButton">
            <button class="button" onclick="location.href = 'memberinfo.php';" buttonType="secondary" type="submit"
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
</body>
<?php
if (isset($_GET['member']) && !empty($_GET["member"])) {
    $member = $_GET['member'];
    //echo $member;
    if ($member == "empty" ||  $member == "invalid" ||  $member == "invalid_query" ||  $member == "connection_failure" ||  $member == "invalid_id" || $member == "invalid_member_id") {
        echo "<script>document.getElementById('error').classList.add('show');</script>";
    } else if ($member == "success") {
        echo "<script>document.getElementById('success').classList.add('show');</script>";
    }
}
?>
<!-- <script type="text/javascript" src="/scripts/navbar.js"></script> -->

</html>