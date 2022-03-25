<title><?php if(isset($vehicles['invMake'])){ echo " $vehicles[invMake] $vehicles[invModel]";} ?> | PHP Motors</title>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>

<nav>
<?php 
 echo $navList?> 
</nav>

<title><?php echo $invId; ?> vehicles | PHP Motors, Inc.</title>


<h1><?php if(isset($vehicles['invMake'])){ echo "$vehicles[invMake] $vehicles[invModel]";} ?></h1>

<?php if(isset($message)){
 echo $message; }
 ?>



<?php if(isset($thumbnailDisplay)){
 echo $thumbnailDisplay;
} ?>


<?php if(isset($vehicleDisplay)){
 echo $vehicleDisplay;
} ?>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  