<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>


<nav>
<?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
echo $navList?> 
</nav>

<?php
if (isset($message)) {
 echo $message;
}
?>

<form method="post" action="/phpmotors/accounts/index.php">
  <label for="clientFirstname">First Name </label><br>
  <input name="clientFirstname" id="clientFirstname" type="text"  placeholder="First name" required="required"  <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?>><br>
  <label for="clientLastname">Last Name</label><br>
  <input name="clientLastname" id="clientLastname" type="text" placeholder="Last name" required="required"  <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?>><br>
  <label for="clientEmail">Email</label><br>
  <input name="clientEmail" id="clientEmail" type="email" placeholder="Email" required="required"  <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>><br>
  <label for="clientPassword" >Password:</label><br>
  <input name="clientPassword" id="clientPassword" type="password" placeholder="Password" required="required" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="this.setCustomValidity('Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character')" oninput="this.setCustomValidity('')"> <br>
  <button type="submit">Register</button>

 <!-- Add the action name - value pair -->
 <br> <input type="hidden" name="action" value="register">
</form>
 




<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  
