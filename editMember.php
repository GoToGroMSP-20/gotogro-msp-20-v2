<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS & Js Sheets -->
    <link href="styles/styles.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="scripts/searchmember.js"></script>
    <!-- <link rel="icon" href="./assets/icons/SiOverleaf.svg" type="image/icon" />-->
    <title>GoToGro | Edit Member</title>
</head>

<body>
    <?php
  // NAV BAR
  //include_once ("navbar.inc");
  ?>
    <div className="editmember">
        <h1 className="white-text">Search for member </h1>
        <form method="post" action="searchMEMBER.php" novalidate="novalidate">
            <div class="inputField">
                <!-- <label for="member_id">Search for member </label>-->
                <input type="text" name="member_id" id="member_id" required="required"
                    placeholder="Enter member's email or mobile number" onblur="member_valid();" />
                <button class="button" buttonType="primary" type="submit" name="submit">Search </button>
                <br>
            </div>
        </form>
</body>

</html>