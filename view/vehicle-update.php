<title><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	 echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	elseif(isset($invMake) && isset($invModel)) { 
		echo "Modify $invMake $invModel"; }?> | PHP Motors</title>



<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>


<?php
  $classList = '<select class="dropdown-menu" name="classificationId">';
  $classList .= '<option>Select a Classification</option>';
  foreach($classifications as $classification) {
    $classList .= "<option value='$classification[classificationId]'";
    if(isset($classificationId)){
      if($classification['classificationId'] === $classificationId){
        $classList .= ' selected ';
      }
    } elseif(isset($invInfo['classificationId'])){
    if($classification['classificationId'] === $invInfo['classificationId']){
     $classList .= ' selected ';
    }
   }
   $classList .= ">$classification[classificationName]</option>";
   }
   $classList .= '</select>';

?>


<nav>
<?php 
 echo $navList?> 
</nav>

<?php
//echo $invMake
?>


<h1><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
elseif(isset($invMake) && isset($invModel)) { 
	echo "Modify $invMake $invModel"; }?></h1>
<?php



if (isset($message)) {
 echo $message;
}

?>


  <form method="post" action="/phpmotors/vehicles/index.php">
  <label>Choose a car:</label>
  <br>

  <?php 

  echo $classList;
  ?>
  <br>
  <br>
  <label for="invMake">Make</label>
  <br>
  <input type="text" id="invMake" name="invMake" required="required" <?php if(isset($invMake)){echo "value='$invMake' ";} elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; } ?>>
 <br>
  <label for="invModel">Model</label>
  <br>
  <input type="text" id="invModel" name="invModel"  required="required" <?php if(isset($invModel)){echo "value='$invModel'";}  elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>>
 <br>
  <label for="invDescription">Reviews</label>
 <br>
<textarea id="invDescription" name="invDescription" rows="2" cols="20" required oninvalid="this.setCustomValidity('Please enter a review')" oninput="this.setCustomValidity('')" ><?php if(isset($invDescription)){echo $invDescription;} elseif(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; } ?></textarea>
 <br>
  <label for="invImage">Image path</label>
  <br>
  <input type="text" id="invImage" name="invImage" required="required" <?php if(isset($invImage)){echo "value='$invImage'";} elseif(isset($invInfo['invImage'])) {echo "value='$invInfo[invImage]'"; } ?>>
  <br>
  <label for="invThumbnail">Thumbnail path</label>
  <br>
  <input type="text" id="invThumbnail" name="invThumbnail"  required="required" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} elseif(isset($invInfo['invThumbnail'])) {echo "value='$invInfo[invThumbnail]'"; } ?>>
  <br>
  <label for="invPrice">Price</label>
  <br>
  <input type="text" id="invPrice" name="invPrice"  required="required" <?php if(isset($invPrice)){echo "value='$invPrice'";}  elseif(isset($invInfo['invPrice'])) {echo "value='$invInfo[invPrice]'"; }?>>
  <br>
  <label for="invStock">In Stock</label>
  <br>
  <input type="text" id="invStock" name="invStock"   required="required" <?php if(isset($invStock)){echo "value='$invStock'";}  elseif(isset($invInfo['invStock'])) {echo "value='$invInfo[invStock]'"; }?>>
  <br>
  <label for="invColor">Color</label>
  <br>
  <input type="text" id="invColor" name="invColor" required="required" <?php if(isset($invColor)){echo "value='$invColor'";}  elseif(isset($invInfo['invColor'])) {echo "value='$invInfo[invColor]'"; }?>>
 <br> <input type="hidden" name="action" value="updateVehicle">
 <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} elseif(isset($invId)){ echo $invId; } ?>">
 <br>
  <button type="submit" value="Update Vehicle">Update</button>
</form>
  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  