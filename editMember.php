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
                <input type="hidden" name="member_id" id="member_id" value="1" />
            </div>
            <div class="button1">
                <button class="button" id=button1 buttonType="primary" type="submit" name="submit">Save Details</button>
            </div>

            <div class="button2">
                <button class="button" id=button2 buttonType="secondary" type="reset" name="cancel">Cancel</button>
            </div>


        </form>
    </main>
</body>
<script type="text/javascript" src="/scripts/navbar.js"></script>

</html>