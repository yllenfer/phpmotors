<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>

<!-- <nav> -->
<?php 
 echo $navList?> 
<!-- </nav> -->

<title><?php  if(isset($vehicles['invMake'])){ echo "$vehicles[invMake] $vehicles[invModel]";} ?> | PHP Motors, Inc.</title>


<h1><?php if(isset($vehicles['invMake'])){ echo "$vehicles[invMake] $vehicles[invModel]";} ?></h1>

<?php //if(isset($message)){
 echo $message;
 //}
 ?>

<?php
echo $thumbnailDisplay;
?>

<?php if(isset($buildThubmnails)){echo $buildThubmnails;} ?>



<?php if(isset($vehicleDisplay)){echo $vehicleDisplay;} ?>

<!-- When cliente is logged in -->

<?php
if(isset($_SESSION['loggedin'])){
echo "<h3 class='reviewTitle'>Review " .  $vehicles['invMake'] . " ". $vehicles['invModel'].  "</h3>";
echo $reviewDisplay;}


else{
echo "<h4 class='logintoReview'>You must <a href='/phpmotors/accounts/index.php?action=login'>Login</a>  to leave a review</h4>";}?>



<?//php if(isset($buildReviewsInfo)){echo $buildReviewsInfo;} ?>

<?php
if(($buildReviewsInfo) > 1){
   echo $buildReviewsInfo;

}else {
     echo "<h3>Be the first one to leave a review </h3>"; 
}
?>


<?php echo $message2; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
<?php unset($_SESSION['message']); ?>  