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
    <?php include_once("navbar.inc"); ?>
    <main>
        <form method="post" action="processMEMBER.php" class="form">
            <div class="form-input">
                <h1>Add New Member</h1>
                <h3>Personal Info</h3>
            </div>
            <div class="form-input">
                <label for="fname">First name:</label>
                <input type="text" pattern="[a-zA-Z]{2,20}" id="fname" name="fname" required>
            </div>
            <div class="form-input">
                <label for="lname">Last name:</label>
                <input type="text" pattern="[a-zA-Z]{2,20}" id="lname" name="lname" required>
            </div>
            <div class="form-input">
                <label for="date">Date of Birth:</label>
                <input type="date" pattern="^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$" id="date" name="date"
                    required>
            </div>
            <div class="form-input">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
            </div>
            <div class="form-input">
                <label for="mnumber">Mobile Number (Optional):</label>
                <input type="text" id="mnumber" name="mnumber" maxlength="10" pattern="[\d]{10}"
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