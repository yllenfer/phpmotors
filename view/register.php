<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>


<nav>
<?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
echo $navList?> 
</nav>

<div>

 <!-- TODO: Why can I not type on the form -->
<form>
  <label for="fname">First Name </label><br>
  <input name="clientFirstname" id="clientFirstname" type="text" value="Firstname"><br>
  <label for="fname">First Last </label><br>
  <input name="clientFirstname" id="clientLastname" type="text" value="Lastname"><br>
  <label for="fname">Email</label><br>
  <input name="clientEmail" id="clientEmail" type="text" value="Email"><br>
  <label for="password">Password:</label><br>
  <input name="clientPassword" id="clientPassword" type="text" value="Password">
</form>


<button type="button">Register</button>

<!-- <div>No account? <a href="/phpmotors/view/register.php">Sign up</a> </div> -->
</div>


<?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  
