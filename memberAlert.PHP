<!DOCTYPE html>
<html lang="en">

<head>
  <link href="./styles/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <?php include_once("navbar.inc"); ?>
  <main>

  <div class="alert">
    <strong>Unable to Edit Member Details</strong>
    <?php echo file_get_contents("./assets/icons/FaTimesCircle.svg") ; ?>
    <button class="button" onclick="location.href='editMember.PHP';" buttonType="primary" type="submit" name="submit" id="submit">Back to Edit Member</button>
  </div>

  <div class="alert">
    <strong>Success</strong>
    <?php echo file_get_contents("./assets/icons/FaCheckCircle.svg") ; ?>
    <button class="button" onclick="location.href='addOrder.PHP';" buttonType="primary" type="submit" name="submit" id="submit">Add an Order </button>
  </div>

</body>
<script type="text/javascript" src="/scripts/navbar.js"></script>
</html>