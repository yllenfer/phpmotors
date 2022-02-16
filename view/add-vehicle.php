<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>


<nav>
<?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
echo $navList?> 
</nav>




<h1>Add vehicle</h1>
<!-- // TODO: Need to have a query that retrieves the current list of cars -->

<?php
if (isset($message)) {
 echo $message;
}
?>
  <form method="post" action="/phpmotors/vehicles/index.php">
  <label for="cars">Choose a car:</label>
  <br>
  <!-- <select id="cars" name="cars">
    <option value="suv">SUV</option>
    <option value="sports">Sports</option>
    <option value="trucks" selected>Trucks</option>
    <option value="used">Used</option>

  </select> -->

  <?php 

  echo $classList
  ?>
  <br>
  <label for="make">Make</label>
  <br>
  <input type="text" id="invMake" name="invMake">
<br>
  <label for="invModel">Model</label>
  <br>
  <input type="text" id="invModel" name="invModel">
<br>
  <label for="invDescription">Reviews</label>
<br>
<textarea id="invDescription" name="invDescription" rows="4" cols="50"> </textarea>
<br>
  <label for="imagepath">Image path</label>
  <br>
  <input type="text" id="invImage" name="invImage" type="text">
  <br>
  <label for="thumnnailpath">Thumbnail path</label>
  <br>
  <input type="text" id="invThumbnail" name="invThumbnail" type="text">
  <br>
  <label for="price">Price</label>
  <br>
  <input type="text" id="invPrice" name="invPrice" type="text">
  <br>
  <label for="invStock">In Stock</label>
  <br>
  <input type="text" id="invStock" name="invStock" type="text">
  <br>
  <label for="invColor">Color</label>
  <br>
  <input type="text" id="invColor" name="invColor" type="text">
 <br> <input type="hidden" name="action" value="addVehicle">
 <br>
  <button type="submit">Add car</button>
</form>
  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  