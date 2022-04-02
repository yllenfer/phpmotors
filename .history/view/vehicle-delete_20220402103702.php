<title><?php if(isset($invInfo['invMake'])){ echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>



<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>



<nav>
<?php 
 echo $navList?> 
</nav>

<?php
if (isset($message)) {
 echo $message;
}
?>

<h1><?php if(isset($vehicles['invMake'])){ echo "$vehicles[invMake] $vehicles[invModel]";} ?></h1>
<h1> <?php echo "$vehicles[invModel]"; ?> </h1>



<?php if (isset($message)) {echo $message;}?>
<h4 class="usethis">Confirm Vehicle Deletion. The delete is permanent</h4>

  <form class="deleteForm" method="post" action="/phpmotors/vehicles/index.php">
  <br>
  <label for="invMake">Make</label>
  <br>
  <input type="text" id="invMake" name="invMake" readonly required="required" <?php if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; ;} ?>>
 <br>
  <label for="invModel">Model</label>
  <br>
  <input type="text" id="invModel" name="invModel" readonly required="required" <?php if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'";} ?>>
 <br>
  <label for="invDescription">Reviews</label>
 <br>
<textarea id="invDescription" name="invDescription" readonly rows="2" cols="20" required oninvalid="this.setCustomValidity('Please enter a review')" oninput="this.setCustomValidity('')" ><?php if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription'];}  ?></textarea>
 <br>
 
 <br> <input type="hidden" name="action" value="deleteVehicle">
 <input type="hidden" name="invId" value="
<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} elseif(isset($invId)){ echo $invId; } ?>">
  <button type="submit" value="Delete Vehicle">Delete</button>
</form>
  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  