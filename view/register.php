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
  <input name="clientFirstname" id="clientFirstname" type="text"  placeholder="First name"><br>
  <label for="clientLastname">Last Name</label><br>
  <input name="clientLastname" id="clientLastname" type="text" placeholder="Last name" ><br>
  <label for="clientEmail">Email</label><br>
  <input name="clientEmail" id="clientEmail" type="text" placeholder="Email" ><br>
  <label for="clientPassword" >Password:</label><br>
  <input name="clientPassword" id="clientPassword" type="text" placeholder="Password" ><br>
  <button type="submit">Register</button>

 <!-- Add the action name - value pair -->
 <br> <input type="hidden" name="action" value="register">
</form>
 




<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  
