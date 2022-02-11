
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>


<nav>
<?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
echo $navList?> 
</nav>

<h1>Add car classification</h1>

<form method="post" action="/phpmotors/vehicles/index.php">
  <input name="classificationName" id="classificationName" type="text"  placeholder="Add car classification"><br>
  <button type="submit">Add car</button>
</form>
 

<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  