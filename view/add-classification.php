
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>


<nav>
<?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
 echo $navList
?> 

</nav>




<h1>Add car classification</h1>
<?php
if (isset($message)) {
 echo $message;
}
?>

<form method="post" action="/phpmotors/vehicles/index.php" >
  <label for="classificationName">Classification</label><br>
  <input name="classificationName" id="classificationName" type="text"  placeholder="Add car classification" required="required" maxlength="30" oninvalid="this.setCustomValidity('Enter a valid classification')" oninput="this.setCustomValidity('Only 30 characters are allowed')"><br>
  <br> <input type="hidden" name="action" value="classification">
  <h6>Only 30 characters are allowed</h6>
  <button type="submit">Add car</button>
</form>
 

<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  