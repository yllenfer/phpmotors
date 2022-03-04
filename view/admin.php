
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>


<nav>
<?php 
echo $navList?> 
</nav>

<?php
//if (isset($_SESSION['loggedin'])) {
 // echo $_SESSION['loggedin'];
 //}
?>

<?php
echo "<h1 class='loginName'>".  $_SESSION['clientData']['clientFirstname'] . " " . $_SESSION['clientData']['clientLastname'] . "</h1>";

echo  "<ul class='infoList'>
    <li>First name: " . $_SESSION['clientData']['clientFirstname'] . "</li>" .
    "<li>Last name: " . $_SESSION['clientData']['clientLastname'] . "</li>" .
     "<li>Email: " . $_SESSION['clientData']['clientEmail'] .  "</li>"
    . "</ul>";

?>

<?php

if(isset($_SESSION['loggedin']) and ($_SESSION['clientData']['clientLevel'])== 1){
    echo "<h3>Inventory management</h3>";
    echo "<p class='usethis'>Use this link to manage the inventory<p>";
    echo "<a class='usethis' href='/phpmotors/vehicles/index.php?action=vehicle-mang'>Vehicle management</a>";
}


?>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  
