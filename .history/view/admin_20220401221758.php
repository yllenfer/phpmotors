
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
<title><?php echo $_SESSION['clientData']['clientFirstname']; ?> Information | PHP Motors, Inc.</title>


<nav>
<?php 
echo $navList?> 
</nav>

<?php
if (isset($_SESSION['loggedin'])) {
 echo $_SESSION['loggedin'];
 }

 if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    }
?>



<?php
echo "<h1 class='loginName'>".  $_SESSION['clientData']['clientFirstname'] . " " . $_SESSION['clientData']['clientLastname'] . "</h1>";
echo "<h3 class='usethis'>You are logged in </h3>";
echo  "<ul class='infoList'>
    <li>First name: " . $_SESSION['clientData']['clientFirstname'] . "</li>" .
    "<li>Last name: " . $_SESSION['clientData']['clientLastname'] . "</li>" .
     "<li>Email: " . $_SESSION['clientData']['clientEmail'] .  "</li>"
    . "</ul>";

?>


<?php
if(isset($buildMyReview)){
    echo $buildMyReview;
}
?>




<?php
echo "<a class='usethis' href='/phpmotors/accounts/index.php?action=accountUpdate'>Update Account Information</a>";


?>

<?php if(isset($_SESSION['loggedin']) and ($_SESSION['clientData']['clientLevel'])== 3){
        echo "<h3>Inventory management</h3>";
        echo "<p class='usethis'>Use this link to manage the inventory<p>";
        echo "<a class='usethis' href='/phpmotors/vehicles/index.php'>Vehicle management</a>";}?>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?> 
<?php unset($_SESSION['message']); ?>


<!-- TODO: Things I need to work on:
The "Be the first to leave a review"
Success when the review is added.
Header of car when leaveing review -->