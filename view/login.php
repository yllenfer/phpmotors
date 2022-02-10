
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
  <label for="clientFirstname">Username:</label><br>
  <input name="clientFirstname" id="clientFirstname" type="text" placeholder="Username" required="required"><br>
  <label for="clientPassword">Password:</label><br>
  <input name="clientPassword" id="clientPassword" type="text" placeholder="Password" required="required"><br>
  <button type="submit">Login</button>
<div>No account? <a href="/phpmotors/accounts/index.php?action=register">Sign up</a> </div>

</form>





<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  
