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
        <div class="memberinfo" id="memberinfo">
            <form method="post" action="searchMEMBER.php" novalidate="novalidate">
                <div class="inputField">
                    <label for="member_id">Search for member</label>
                    <br>
                    <div id="emember">
                        <div id="row_1">
                            <input
                                type="email"
                                name="member_id"
                                id="member_id"
                                required="required"
                                placeholder="Enter member's email"
                                onblur="member_valid();"
                            />
                        </div>
                        <button class="button" buttonType="primary" type="submit" name="submit" id="submit">Search</button>
                    </div>
                </div>
            </form>
            
            <!-- Error dialog -->
            <dialog class="error" id="error">
                <div class="popup-status">
                    <?php echo file_get_contents("./assets/icons/FaTimesCircle.svg"); ?>
                    <p>Oops! Something broke from our end. Please contact our technicians for support (Error code: 500)</p>
                </div>
                <button class="button" onclick="location.href = 'memberInfo.php';" buttonType="primary" name="search member">Back to Search Member</button>
            </dialog>

        </div>
    </body>
    <?php
        if (isset($_GET['member_id']) && !empty($_GET["member_id"])) {
            $member_id = $_GET['member_id'];
            //echo $member_id;
            if ($member_id == "empty" ||  $member_id == "invalid" ||  $member_id == "invalid_query" ||  $member_id == "connection_failure") {
                echo "<script>document.getElementById('error').classList.add('show');</script>";
            }
        }
    ?>
    <script type="text/javascript" src="/scripts/navbar.js"></script>

</html>