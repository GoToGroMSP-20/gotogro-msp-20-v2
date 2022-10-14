<nav class="navbar">
  <div class="logo-container">
    <div class="logo">
      <?php echo file_get_contents("./assets/icons/SiOverleaf.svg"); ?>
    </div>
    <div>
      <div class="company-name">GoToGro</div>
      <div class="app-name">Member</div>
    </div>
  </div>
  <ul>
    <li>
      <a class="nav-item" href="/addOrder.php">
        <?php echo file_get_contents("./assets/icons/FaCashRegister.svg"); ?> Add Order
      </a>
    </li>
    <li>
      <a class="nav-item" href="/addMember.php">
        <?php echo file_get_contents("./assets/icons/MdPersonAddAlt1.svg"); ?> Add Member
      </a>
    </li>
    <li>
      <a class="nav-item" href="/memberInfo.php">
        <?php echo file_get_contents("./assets/icons/MdPersonSearch.svg"); ?> Member Info
      </a>
    </li>
    <li>
      <a class="nav-item" href="/salesReport.php">
        <?php echo file_get_contents("./assets/icons/RiFileList3Fill.svg"); ?> Sales Report
      </a>
    </li>
  </ul>
  <script type="text/javascript" src="./scripts/navbar.js"></script>
</nav>
