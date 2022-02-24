
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

<form class="login">
  <label for="clientEmail">User Email:</label><br>
  <input name="clientEmail" id="clientEmail" type="email" placeholder="Email" required="required" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>><br>
  <label for="clientPassword">Password:</label><br>
  <input name="clientPassword" id="clientPassword" type="password" placeholder="Password" required="required" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="this.setCustomValidity('Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character')" oninput="this.setCustomValidity('')"> <br>
  <button type="submit">Login</button>
<div>No account? <a href="/phpmotors/accounts/index.php?action=register">Sign up</a> </div>
<input type="hidden" name="action" value="login">
</form>





<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  
