<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>


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
  <label for="cars">Choose a car:</label>
  <br>

  <?php 

  echo $classList
  ?>
  <br>
  <label for="make">Make</label>
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
  <label for="imagepath">Image path</label>
  <br>
  <input type="text" id="invImage" name="invImage" type="text"  required="required" <?php if(isset($invImage)){echo "value='$invImage'";}  ?>>
  <br>
  <label for="thumnnailpath">Thumbnail path</label>
  <br>
  <input type="text" id="invThumbnail" name="invThumbnail" type="text"  required="required" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?>>
  <br>
  <label for="price">Price</label>
  <br>
  <input type="text" id="invPrice" name="invPrice" type="text"  required="required" <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?>>
  <br>
  <label for="invStock">In Stock</label>
  <br>
  <input type="text" id="invStock" name="invStock" type="text"  required="required" <?php if(isset($invStock)){echo "value='$invStock'";}  ?>>
  <br>
  <label for="invColor">Color</label>
  <br>
  <input type="text" id="invColor" name="invColor" type="text"  required="required" <?php if(isset($invColor)){echo "value='$invColor'";}  ?>>
 <br> <input type="hidden" name="action" value="addVehicle">
 <br>
  <button type="submit">Add car</button>
</form>
  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  