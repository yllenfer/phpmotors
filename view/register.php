<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>


<nav>
<?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
echo $navList?> 
</nav>


<form>
  <label for="clientFirstname">First Name </label><br>
  <input name="clientFirstname" id="clientFirstname" type="text" required="required" placeholder="First name"><br>
  <label for="clientLastname">Last Name</label><br>
  <input name="clientLastname" id="clientLastname" type="text" placeholder="Last name" required="required"><br>
  <label for="clientEmail">Email</label><br>
  <input name="clientEmail" id="clientEmail" type="text" placeholder="Email" required="required"><br>
  <label for="clientPassword" >Password:</label><br>
  <input name="clientPassword" id="clientPassword" type="text" placeholder="Password" required="required"><br>
  <button type="submit">Register</button>
</form>




<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  
