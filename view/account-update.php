<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>


<nav>
<?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
echo $navList?> 
</nav>

<h1>Manage account</h1>

<?php

if (isset($message)) {
 echo $message;
}

//$email = $_SESSION['clientData']['clientEmail'];
//echo $email;
?>

<form class="updateForm" method="post" action="/phpmotors/accounts/index.php">
  <label for="clientFirstname">First Name </label><br>
  <input name="clientFirstname" id="clientFirstname" type="text"  placeholder="First name" required="required"  <?php if(isset($clientFirstname)){echo "value='$clientFirstname' ";} elseif(isset($_SESSION['clientData']['clientFirstname'])) {echo "value='" . $_SESSION['clientData']['clientFirstname']. "'"; } ?>><br>
  <label for="clientLastname">Last Name</label><br>
  <input name="clientLastname" id="clientLastname" type="text" placeholder="Last name" required="required"  <?php if(isset($clientFirstname)){echo "value='$clientLastname' ";} elseif(isset($_SESSION['clientData']['clientLastname'])) {echo "value='" . $_SESSION['clientData']['clientLastname']. "'"; } ?>><br>
  <label for="clientEmail">Email</label><br>
  <input name="clientEmail" id="clientEmail" type="text" placeholder="Email" required="required" <?php if(isset($checkEmail)){echo "value='$clientEmail' ";} elseif(isset($_SESSION['clientData']['clientEmail'])) {echo "value='" . $_SESSION['clientData']['clientEmail']. "'"; } ?>><br>

 

 <!-- Add the action name - value pair -->
 <input type="hidden" name="action" value="accountUpdate">
 <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId'];} ?>">
 <button type="submit">Update</button>
 </form>

 <form class="updatePasswordForm" method="post" action="/phpmotors/accounts/index.php">
<div class="passwordDiv">
 <h3 class="usethis">Update password</h3>
 <p>Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special chatacter </p>
 <p>*note your origial password will be changed</p>
 </div>
 <label for="clientPassword" >Password:</label><br>
<input name="clientPassword" id="clientPassword" type="password" placeholder="Password" required="required" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="this.setCustomValidity('Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character')" oninput="this.setCustomValidity('')"> <br>
<input type="hidden" name="action" value="passwordUpdate">
 <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId'];} ?>">
 <button class="updatePassword" type="submit">Update</button>
</form>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?> 

<!-- TODO: Should I have a different form? -->