<!DOCTYPE html>
<html lang="en">

<head>
  <link href="./styles/styles.css" rel="stylesheet" type="text/css" />
  <link rel="icon" href="assets/icons/SiOverleaf.svg" type="image/icon" />
  <title>GoToGro | Display Member Details</title>
</head>


<body>


<?php
require_once("settings.php"); 
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if(!$conn) {
        echo "<script type='text/javascript' src='./scripts/salesreportdialog.js'></script>";
        exit();
    } else {

        $member_id = "redguy@donthugme.com";

        $user_query =  "SELECT * FROM member WHERE email = '$member_id'";
                                   
        $user_result = mysqli_query($conn, $user_query);       
        if(!$user_result) {
        echo "<script type='text/javascript' src='./scripts/salesreportdialog.js'></script>";
        exit();
        } else if(mysqli_num_rows($user_result) == 0) {
        echo "<script type='text/javascript' src='./scripts/salesreportdialog.js'></script>";
        exit();
        } else {
        $row = mysqli_fetch_assoc($user_result);
        }
    }            
                
?>


<?php
  include_once("navbar.inc");
  ?>
    <main>
        <form method="get" action="searchMEMBER.php" class="memberDetailsform">

            <div class="memberDetails">
            <?php echo "<h1>$row{['firstName'] $row{['lastName']}</h1>" ?>
                <h3>Member Details</h3>
            </div>


            <div class="memberDetails">
                <label for="memberID" id="memberid">Member ID</label>
                <!-- <input type="text" pattern="[a-zA-Z]{2,20}" id="firstname" name="firstname" required /> -->
                <?php
                    echo "<p>{$row['member_id']}</p>"
                ?>

            </div>

            <div class="memberDetails">
                <label for="DateofBirth" id="dob">Date of Birth</label>
                <!-- <input type="text" min='1900-01-01' max='2100-01-01' name="dateofbirth" id="dateofbirth" required
                    placeholder="YYYY-MM-DD" /> -->
                <?php
                    echo "<p>{$row['dob']}</p>"
                ?>    
            </div>

            <div class="memberDetails">
                <label for="email" id="em">Email</label>
                <!-- <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required /> -->
                <?php
                    echo "<p>{$row['email']}</p>"
                ?>   
            </div>

            <div class="memberDetails">
                <label for="phonenum" id="mobilenum">Mobile Number</label>
                <!-- <input type="tel" name="phonenum" id="phonenum" maxlength="10" pattern="[\d]{10}" -->
                    <!-- placeholder="For eg. 0400000000" /> -->
                    <?php
                    echo "<p>{$row['mobile']}</p>"
                ?>   

                <input type="hidden" name="member_id" id="member_id" value="1" />
            </div>
            <div class="button1">
                <button class="button" id=button1 buttonType="primary" type="submit" name="submit">Edit Details</button>
            </div>

            <div class="button3">
                <button class="button" id=button3 buttonType="secondary" type="reset" name="cancel">Delete Member</button>
            </div>


        </form>
    </main>

</body>
<script type="text/javascript" src="/scripts/navbar.js"></script>

</html>