
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>


<nav>
<?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
echo $navList?> 
</nav>

<div>

 <!-- TODO: Why can I not type on the form -->
<form class="login">
  <label for="fname">Username:</label><br>
  <input name="clientFirstname" id="clientFirstname" type="text" value="Username"><br>
  <label for="password">Password:</label><br>
  <input name="clientPassword" id="clientPassword" type="text" value="Password">
</form>


<button type="button">Login</button>

<div>No account? <a href="/phpmotors/view/register.php">Sign up</a> </div>
</div>


<?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  
