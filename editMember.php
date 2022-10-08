<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS & Js Sheets -->
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="scripts/searchmember.js"></script>
    <link rel="icon" href="./assets/icons/SiOverleaf.svg" type="image/icon" />
    <title>GoToGro | Edit Member</title>
</head>

<body>
    <?php
    include_once("navbar.inc");
    ?>
    <div class="editmember">
        <!-- <h1 class="white-text">Search for member </h1>-->
        <form method="post" action="searchMEMBER.php" novalidate="novalidate">
            <div class="inputField">
                <label for="member_id">Search for member </label>
                <br>
                <div id="emember">
                    <input type="text" name="member_id" id="member_id" required="required"
                        placeholder="Enter member's email or mobile number" onblur="member_valid();" />

                    <button class="button" buttonType="primary" type="submit" name="submit" id="submit">Search </button>
                    <span id=member_error></span>
                </div>
            </div>
        </form>
    </div>
</body>
<?php
if (isset($_GET['member_id']) && !empty($_GET["member_id"])) {
    $member_id = $_GET['member_id'];
    //echo $member_id;
    if ($member_id == "empty" ||  $member_id == "invalid") {
        echo "<script>document.getElementById('emember').classList.add('invalid');
        document.getElementById('member_error').innerText = 'Invalid Member ID';</script>";
    } else if ($member_id == "valid") {
        echo "<script>document.getElementById('emember').classList.add('valid');
        document.getElementById('member_error').innerText = 'Valid Member ID';</script>";
    }
}
?>

</html>