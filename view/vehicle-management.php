
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>

<?php
//TODO: What's wrong with this header?
// if ($_SESSION['clientData']['clientLevel'] < 2) {
//  header('location: /phpmotors/');
//  exit;
// }

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
   }

?>

<nav>
<?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
echo $navList?> 
</nav>
 <h1>Vechicle Management </h1>


<noscript>
<p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
</noscript>





 <ul class="usethis">
<li><a  href="/phpmotors/vehicles/index.php?action=add-classification">Add classification</a></li>
<li><a  href="/phpmotors/vehicles/index.php?action=add-vehicle">Add vehicle</a></li>
</ul>


<br>

<br>

<?php

 if (isset($message)) { 
  echo $message; 
 } 
//  echo $classificationList;
 if (isset($classificationList)) { 
    
 echo '<h3>Vehicles By Classification</h3>'; 
 echo '<p class="usethis">Choose a classification to see those vehicles</p>'; 
  echo $classificationList; 
 }
?>

<table id="inventoryDisplay"></table>
<script src="/phpmotors/js/inventory.js"></script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?> 
<?php unset($_SESSION['message']); ?>