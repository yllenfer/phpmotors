<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>


<?php
  $classList = '<select class="dropdown-menu" id="classification-list" name="classificationId">';
  $classList .= '<option selected disabled>Select a Classification</option>';
  foreach ($classifications as $classification) {
    $classList .= "<option value='$classification[classificationId]'";
    if(isset($classificationId)){
      if($classification['classificationId'] === $classificationId){
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




<h1>Add vehicle</h1>
<?php
if (isset($message)) {
 echo $message;
}
?>


  <form method="post" action="/phpmotors/vehicles/index.php">
  <label>Choose a car:</label>
  <br>

  <?php 

  echo $classList
  ?>
  <br>
  <label for="invMake">Make</label>
  <br>
  <input type="text" id="invMake" name="invMake" required="required" <?php if(isset($invMake)){echo "value='$invMake'";}  ?>>
 <br>
  <label for="invModel">Model</label>
  <br>
  <input type="text" id="invModel" name="invModel"  required="required" <?php if(isset($invModel)){echo "value='$invModel'";}  ?>>
 <br>
  <label for="invDescription">Reviews</label>
 <br>
<textarea id="invDescription" name="invDescription" rows="2" cols="20" required oninvalid="this.setCustomValidity('Please enter a review')" oninput="this.setCustomValidity('')" ><?php if(isset($invDescription)){echo $invDescription;}  ?></textarea>
 <br>
  <label for="invImage">Image path</label>
  <br>
  <input type="text" id="invImage" name="invImage" required="required" <?php if(isset($invImage)){echo "value='$invImage'";}  ?>>
  <br>
  <label for="invThumbnail">Thumbnail path</label>
  <br>
  <input type="text" id="invThumbnail" name="invThumbnail"  required="required" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?>>
  <br>
  <label for="invPrice">Price</label>
  <br>
  <input type="text" id="invPrice" name="invPrice"  required="required" <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?>>
  <br>
  <label for="invStock">In Stock</label>
  <br>
  <input type="text" id="invStock" name="invStock"   required="required" <?php if(isset($invStock)){echo "value='$invStock'";}  ?>>
  <br>
  <label for="invColor">Color</label>
  <br>
  <input type="text" id="invColor" name="invColor" required="required" <?php if(isset($invColor)){echo "value='$invColor'";}  ?>>
 <br> <input type="hidden" name="action" value="addVehicle">
 <br>
  <button type="submit">Add car</button>
</form>
  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  