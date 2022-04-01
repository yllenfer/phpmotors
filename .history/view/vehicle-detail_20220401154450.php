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

<?php if(isset($buildThubmnails)){
 echo $buildThubmnails;
 
} ?>



<?php if(isset($vehicleDisplay)){
    echo $vehicleDisplay;
} ?>



<!-- When cliente is logged in -->

<?php
if(isset($_SESSION['loggedin'])){
  echo "<h3 class='reviewTitle'>Review " .  $vehicles['invMake'] . " ". $vehicles['invModel'].  "</h3>";
  //Here I am displaying the form
 echo $reviewDisplay;
//  var_dump($reviewDisplay);
//  exit;

}

// else if (isset($_SESSION['loggedin']) && count($buildReviewsInfo)<1){
//  echo "Hello world";
//  exit;
// }

else{
    // echo "<h3><br><br>Customer Reviews </h3>";
    echo "<h4 class='usethis'>You must <a href='/phpmotors/accounts/index.php?action=login'>Login</a>  to leave a review</h4>";   
}


?>



<?php if(isset($buildReviewsInfo)){
    echo $buildReviewsInfo;
    var_dump($buildReviewsInfo);
    exit;
} ?>





<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
<?php unset($_SESSION['message']); ?>  