
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>


<nav>
<?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
echo $navList?> 
</nav>

<div>
<form class="login">
  <label for="fname">Username:</label><br>
  <input name="clientFirstname" id="clientFirstname" type="text" value="Username"><br>
  <label for="password">Password:</label><br>
  <input name="clientPassword" id="clientPassword" type="text" value="Password">
</form>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  
