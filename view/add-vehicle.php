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
  <input type="text" id="invMake">
<br>
  <label for="model">Model</label>
  <br>
  <input type="text" id="invModel">
<br>
  <label for="w3review">Reviews</label>
<br>
<textarea id="invDescription" name="w3review" rows="4" cols="50">
</textarea>
<br>
  <label for="imagepath">Image path</label>
  <br>
  <input type="text" id="invImage">
  <br>
  <label for="thumnnailpath">Thumbnail path</label>
  <br>
  <input type="text" id="invThumbnail">
  <br>
  <label for="price">Price</label>
  <br>
  <input type="text" id="invPrice">
  <br>
  <label for="invStock">In Stock</label>
  <br>
  <input type="text" id="invStock">
  <br>
  <label for="invColor">Color</label>
  <br>
  <input type="text" id="invColor">
 <br> <input type="hidden" name="action" value="addVehicle">
 <br>
  <button type="submit">Add car</button>
</form>
  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  