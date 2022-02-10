<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>


<nav>
<?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
echo $navList?> 
</nav>



<h1>Add vehicle</h1>
<!-- // TODO: Need to have a query that retrieves the current list of cars -->
<label for="cars">Choose a car:</label>
  <select id="cars" name="cars">
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="fiat" selected>Fiat</option>
    <option value="audi">Audi</option>
  </select>
  <br>

  <label for="make">Make</label>
  <input type="text" id="invMake">

<br>
  <label for="model">Model</label>
  <input type="text" id="invModel">
  
<br>
  <label for="w3review">Review of W3Schools:</label>
<br>
<textarea id="w3review" name="w3review" rows="4" cols="50">

</textarea>

<br>
  <label for="imagepath">Image path</label>
  <input type="text" id="invImage">
  
  <br>
  <label for="thumnnailpath">Thumbnail path</label>
  <input type="text" id="invThumbnail">

  <br>
  <label for="price">Price</label>
  <input type="text" id="invPrice">
  
<?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  