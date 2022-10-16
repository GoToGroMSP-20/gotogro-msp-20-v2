<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./styles/styles.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="assets/icons/SiOverleaf.svg" type="image/icon" />
    <title>GoToGro | Add Member</title>
</head>

<body>
    <!-- Success dialog -->
    <dialog class="success" id="success">
        <div class="popup-status">
            <?php echo file_get_contents("./assets/icons/FaCheckCircle.svg"); ?>
            <p>Successfully Added member.</p>
            <button class="button" onclick="location.href = '/addOrder.php';" buttonType="primary" type="submit" name="submit">Add an Order</button>
        </div>
    </dialog>

    <!-- Error dialog -->
    <dialog class="error" id="error" >
        <div class="popup-status">
            <?php echo file_get_contents("./assets/icons/FaTimesCircle.svg"); ?>
            <p>Unable to Add Member. Something broke from our end, please contact our technicians for support. (Error: 500)</p>
            <button class="button" onclick="location.href = '/addMember.php';" buttonType="primary" type="submit" name="submit">Back to Add Member</button>
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

    <?php include_once("navbar.inc"); ?>
    <main>
        <form method="post" action="processMEMBER.php" class="form">
            <div class="form-input">
                <h1>Add New Member</h1>
                <h3>Personal Info</h3>
            </div>
            <div class="form-input">
                <label for="fname">First name:</label>
                <input class="addMemberInput" type="text" pattern="[a-zA-Z]{2,20}" id="fname" name="fname" required>
            </div>
            <div class="form-input">
                <label for="lname">Last name:</label>
                <input class="addMemberInput" type="text" pattern="[a-zA-Z]{2,20}" id="lname" name="lname" required>
            </div>
            <div class="form-input">
                <label for="date">Date of Birth:</label>
                <input class="addMemberInput" type="date" id="date" min='1900-01-01' max='2100-01-01' name="date" required>
            </div>
            <div class="form-input">
                <label for="email">Email:</label>
                <input class="addMemberInput" type="text" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
            </div>
            <div class="form-input">
                <label for="mnumber">Mobile Number (Optional):</label>
                <input class="addMemberInput" type="text" id="mnumber" name="mnumber" maxlength="10" pattern="[\d]{10}"
                    placeholder="For eg. 0400000000">
            </div>
            <div class="button addMember">
                <button class="button addMember" id=button buttonType="primary" type="submit" name="submit">Add
                    Member</button>
            </div>
        </form>
    </main>
</body>
<script type="text/javascript" src="/scripts/navbar.js"></script>

</html>