<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>

<!-- <nav> -->
<?php 
 echo $navList?> 
<!-- </nav> -->

<title><?php echo $invId; ?> vehicles | PHP Motors, Inc.</title>


<h1><?php if(isset($vehicles['invMake'])){ echo "$vehicles[invMake] $vehicles[invModel]";} ?></h1>

<?php if(isset($message)){
 echo $message;
 }
 ?>

<?php
echo $thumbnailDisplay;
?>

<?php if(isset($buildThubmnails)){
 echo $buildThubmnails;
 
} ?>





<!-- //TODO: Add the vehicle review form here -->



<?php if(isset($vehicleDisplay)){
    echo $vehicleDisplay;
} ?>



<!-- <h3 class="reviewTitle"><?php //if(isset($vehicles['invMake'])){ echo "Review $vehicles[invMake] $vehicles[invModel]";} ?></h3>
<?php //if(isset($reviewDisplay)){
    //echo $reviewDisplay;
//} ?> -->




<?//php //if(isset($buildReviews)){
    //echo $buildReviews;
//} ?>




<?//php if(isset($reviewsDisplay)){
   // echo $reviewsDisplay;
//} ?>




<!-- When cliente is logged in -->

<?php
if(isset($_SESSION['loggedin'])){
  echo "<h3 class='reviewTitle'>Review " .  $vehicles['invMake'] . " ". $vehicles['invModel'].  "</h3>";
  echo $reviewDisplay;
  echo $buildReviewsForm;

}

else if($_SESSION['loggedin'] && $reviewDisplay === 0){
    echo "Be the first one to leave a review";
}

else{
    echo "<h3><br><br>Customer Reviews </h3>";
    echo "<h4 class='usethis'>You must <a href='/phpmotors/accounts/index.php?action=login'>Login</a>  to leave a review</h4>";
    
}




?>


<!-- TODO: Build reviews here  -->



<?php if(isset($buildReviewsInfo)){
    echo $buildReviewsInfo;
} ?>




<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
<?php unset($_SESSION['message']); ?>  