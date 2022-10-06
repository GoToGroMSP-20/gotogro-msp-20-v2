<!DOCTYPE html>
<html lang="en">

<head>
  <link href="./styles/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <?php include_once("navbar.inc"); ?>
  <main>
    <form method="post" action="processMEMBER.php" novalidate="novalidate" class="form">
      <div class="form-input">
        <h1>Add New Member</h1>
        <h3>Personal Info</h3>
      </div>
      <div class="form-input">
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname" required>
      </div>
      <div class="form-input">
        <label for="lname">Last name:</label>
        <input type="text" id="lname" name="lname" required>
      </div>
      <div class="form-input">
        <label for="date">Date of Birth:</label>
        <input type="date" id="date" name="date" required>
      </div>
      <div class="form-input">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
      </div>
      <div class="form-input">
        <label for="mnumber">Mobile Number (Optional):</label>
        <input type="text" id="mnumber" name="mnumber">
      </div>
      <div class="button">
        <button class="button" id=button buttonType="primary" type="submit" name="submit">Add Member</button>
      </div>
    </form>
  </main>
</body>
<script type="text/javascript" src="/scripts/navbar.js"></script>

</html>