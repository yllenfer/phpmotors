
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>


<nav>
<?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
echo $navList?> 
</nav>
 <h1>Vechicle Management </h1>

 <ul class="usethis">
<li><a  href="/phpmotors/vehicles/index.php?action=add-classification">Add classification</a></li>
<li><a  href="/phpmotors/vehicles/index.php?action=add-vehicle">Add vehicle</a></li>
</ul>


<br>
<br>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  