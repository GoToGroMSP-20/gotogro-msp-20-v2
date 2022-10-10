<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="./styles/styles.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <?php include_once ("navbar.inc"); ?>
    <main>



      <!-- Success dialog -->
      <dialog class="success">
        <div class="popup-status">
          <?php echo file_get_contents("./assets/icons/FaCheckCircle.svg"); ?>
          <p>Submission successful</p>
        </div>
        <button class="button" onclick="location.href = '/addOrder.php';" buttonType="primary" type="submit" name="submit">Add another order</button>
      </dialog>


      
      <!-- Error dialog -->
      <dialog class="error">
        <div class="popup-status">
          <?php echo file_get_contents("./assets/icons/FaTimesCircle.svg"); ?>
          <p>Oops! Something broke from our end. Please contact our technicians for support (Error code: 500)</p>
        </div>
        <button class="button" onclick="location.href = '/addOrder.php';" buttonType="primary" type="submit" name="submit">Back to Add Order</button>
      </dialog>



    </main>
  </body>
  <script type="text/javascript" src="/scripts/navbar.js"></script>
  <script type="text/javascript" src="/scripts/dialog.js"></script>
</html>
