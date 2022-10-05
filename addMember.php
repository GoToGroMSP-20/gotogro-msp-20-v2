<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="./styles/styles.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <?php include_once ("navbar.inc"); ?>
    <main>
    <form method="post" action="processMEMBER.php" novalidate="novalidate">
      <h1>Add New Member</h1>
        <h3>Personal Info</h3>
    <br>
      <label for="fname">First name:</label><br>
      <input type="text" id="fname" name="fname" required>
    <br>
      <label for="lname">Last name:</label><br>
      <input type="text" id="lname" name="lname"  required>
    <br>
    <label for="date">Date of Birth:</label><br>
    <input type="date" id="date" name="date" required>
    <br>
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email" required>
    <br>
    <label for="mnumber">Mobile Number (Optional):</label><br>
    <input type="text" id="mnumber" name="mnumber">
     <br>
     <button class="button" buttonType="primary" type="submit" name="submit">Add Member</button>
  </form>
    </main>
  </body>
    <script type="text/javascript" src="/scripts/navbar.js"></script>
</html>