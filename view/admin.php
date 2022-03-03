
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
echo "<span class='loginName'>".  $_SESSION['clientData']['clientFirstname'] . " " . $_SESSION['clientData']['clientLastname'] . "</span>";

echo  "<ul class='infoList'>
    <li>First name:" . $_SESSION['clientData']['clientFirstname'] . "</li>" .
    "<li>Last name:" . $_SESSION['clientData']['clientLastname'] . "</li>" .
     "<li>Email:" . $_SESSION['clientData']['clientEmail'] .  "</li>"
    . "</ul>";

?>





<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  
