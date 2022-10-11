<!DOCTYPE html>
<html lang="en">

<head>
  <link href="./styles/styles.css" rel="stylesheet" type="text/css" />
  <link rel="icon" href="assets/icons/SiOverleaf.svg" type="image/icon" />
  <title>GoToGro | Edit Member</title>
</head>

<body>
  <?php include_once("navbar.inc"); ?>

  <main>
    <form method="post" action="processMEMBER.php" novalidate="novalidate" class="editMemberform">

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
        <input type="date" pattern="\d{1,2}\/\d{1,2}\/\d{4}" name="dateofbirth" id="dateofbirth" required />
      </div>

      <div class="editFormInput">
        <label for="email" id="em">Email</label>
        <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
      </div>

      <div class="editFormInput">
        <label for="phonenum" id="mobilenum">Mobile Number (Optional)</label>
        <input type="tel" name="phonenum" id="phonenum" maxlength="12" pattern="[\d\s]{8,12}" placeholder="For eg. 0400 000 000" required />
      </div>




      <div class="button">
        <button class="button" id=button1 buttonType="primary" type="submit" name="submit">Save Details</button>
      </div>

      <div class="buttonCancel">
        <button class="buttonCancel" id=button1 buttonType="secondary" type="reset" name="cancel">Cancel</button>
      </div>


    </form>
  </main>
</body>
<script type="text/javascript" src="/scripts/navbar.js"></script>

</html>