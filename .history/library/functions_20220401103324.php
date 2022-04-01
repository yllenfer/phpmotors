<?php

function checkEmail($clientEmail){
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
   }


   // Check the password for a minimum of 8 characters,
 // at least one 1 capital letter, at least 1 number and
 // at least 1 special character
function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
   }


function navigationList($classifications){
    // Build a navigation bar using the $classifications array
    $navList = '<nav><div id="navbar"><ul>';
    $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
     $navList .= "<li><a href='/phpmotors/vehicles/?action=classification&classificationName=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a></li>";
     
    }
    $navList .= '</ul></div></nav>';
    return $navList;
}


// Check for an existing email address
function checkExistingEmail($clientEmail) {
  $db =  phpmotorsConnect();
  $sql = 'SELECT clientEmail FROM client WHERE clientEmail = :email';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
  $stmt->execute();
  $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
  $stmt->closeCursor();
  if(empty($matchEmail)){
   return 0;
  // echo "Not found";
  exit;
  } else {
   return 1;
  // echo "matched";
  exit;
  }
 }



 // Build the classifications select list 
function buildClassificationList($classifications){ 
  $classificationList = '<br><select name="classificationId" id="classificationList">'; 
  $classificationList .= "<option>Choose a Classification</option>"; 
  foreach ($classifications as $classification) { 
   $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
  } 
  $classificationList .= '</select><br>'; 
  return $classificationList; 
 }



 function buildVehiclesDisplay($vehicles){
  $dv = '<ul id="inv-display">';
  foreach ($vehicles as $vehicle) {
   $dv .= '<li>';
   $dv .= "<a href='/phpmotors/vehicles/?action=detail&invId=" . $vehicle['invId']. "'" ."><img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'></a>";
  //  $dv .= '<hr id="carhr">';
   $dv .= "<a> <h2>$vehicle[invMake] $vehicle[invModel]</h2></a>";
   $dv .= "<span><strong>" . "$" . number_format($vehicle['invPrice']). "</strong></span>";
   $dv .= '</li>';
  }
  $dv .= '</ul>';
  return $dv;
 }


 function buildVehiclesInfo($vehicle){
  $dv = '<ul id="info-display">';
  $dv .= '<li>';
  $dv .= "<img src='$vehicle[invImage]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
  $dv .= "<h3 class='usethis' id='invPrice'>" . "Price: $" . number_format($vehicle['invPrice']) . "</h3>";
 
  $dv .= '</li>';
  // $dv .= "<h2>Hello </h2>";
 
  $dv .= "<li class='vehicletextInfo'>";
  
  $dv .= "<h3 class='vDescription'>" . $vehicle['invMake'] . " ".$vehicle['invModel']  . " Details".  "</h3>";

   $dv .= "<h4 class='usethis' id='invDescription'>" . $vehicle['invDescription'] . "</h4>";
   $dv .= "<h3 class='usethis'>" . "Color: ". $vehicle['invColor'] . "</h3>";
   $dv .= "<h3 class='usethis' id='invStock'>" . "# in Stock: ". $vehicle['invStock'] . "</h3>";
 
   $dv .= "</li>";
  
  $dv .= '</ul>';
 
  return $dv;
 }

//  echo "<script> var element = document.getElementById(invPrice);
//      element.toLocaleString();


//  </script> ";



/* * ********************************
*  Functions for working with images
* ********************************* */


// Adds "-tn" designation to file name
function makeThumbnailName($image) {
  $i = strrpos($image, '.');
  $image_name = substr($image, 0, $i);
  $ext = substr($image, $i);
  $image = $image_name . '-tn' . $ext;
  return $image;
 }



// Build images display for image management view
function buildImageDisplay($imageArray) {
  $id = '<ul id="image-display">';
  foreach ($imageArray as $image) {
   $id .= '<li>';
   $id .= "<img src='$image[imgPath]' title='$image[invMake] $image[invModel] image on PHP Motors.com' alt='$image[invMake] $image[invModel] image on PHP Motors.com'>";
   $id .= "<p><a href='/phpmotors/uploads?action=delete&imgId=$image[imgId]&filename=$image[imgName]' title='Delete the image'>Delete $image[imgName]</a></p>";
   $id .= '</li>';
 }
  $id .= '</ul>';
  return $id;
 }


 // Build the vehicles select list
function buildVehiclesSelect($vehicles) {
  $prodList = '<select name="invId" id="invId">';
  $prodList .= "<option>Choose a Vehicle</option>";
  foreach ($vehicles as $vehicle) {
   $prodList .= "<option value='$vehicle[invId]'>$vehicle[invMake] $vehicle[invModel]</option>";
  }
  $prodList .= '</select>';
  return $prodList;
 }


//Function to create thubmnail 
 function buildVehicleThumbnail($vehicleThumbnails){
  $dv = '<ul>';
  $dv .= '<li class="thumbnail-images">';
  foreach($vehicleThumbnails as $image)
  $dv .= "<img src='$image[imgPath]' title='$image[imgName]  image on PHP Motors.com' alt='$image[imgName] image on PHP Motors.com'>";
  $dv .= "<br>";
  $dv .= "<li class='vehicletextInfo'> </li>";
  $dv .= '</li>';
 
  // $dv .= "</div>";
  $dv .= '</ul>';
  return $dv;
  
 }


//Function to crate form
function buildReviews($invId, $clientId){
  $dv = '<br>';
  $dv .= '<form class="review-form" method="post" action="/phpmotors/reviews/index.php">';
  $dv .= '<label for="clientFirstname">Screen Name</label>';
  $dv .= '<br>';
  $dv .= '<input type="hidden" name="invId"' .'value="' . $invId . ' " >';
  $dv .= '<input type="hidden" name="clientId" value="'. $clientId . '">';
  $dv .= '<input type="text" id="clientFirtname" name="clientFirstname" required="required">';
  $dv .= '<br>';
  $dv .= '<label for="reviewText">Screen Name</label>';
  $dv .= '<br>';
  $dv .= '<textarea id="reviewText" name="reviewText" rows="5" cols="80" required></textarea>';
  $dv .= '<br>';
  $dv .= '<input type="hidden" name="action" value="addReview">';
  // $dv .= '<br>';
  $dv .= '<button type="submit" value="Add Review">Add</button>';
 $dv .= '</form>';
 return $dv;
}

//Function to display review
function getVehicleReview($reviewText){
$dv = '<br>';
$dv .= "<ul class='reviewForm'>";
 foreach($reviewText as $review){
//  $dv .= '<li>';
 $dv .= '<div class="reviewInfo" id="reviewId">' . substr($review['clientFirstname'], 0, 1) . $review['clientLastname']. ' wrote on ' .  date("j F, Y", strtotime($review['reviewDate'])) . '<br>' . $review['reviewText'] . '</div>';
//  $dv .= '</li>';
}
// echo $dv;
// exit;
 $dv .= "</ul>";
 return $dv;
}



//Function to manage rwviews
function manageReview($reviewText){
  $dv = "<ul>";
  $dv .= '<h3>Manage your product review <h3>';
  foreach($reviewText as $review){
    // $dv .= '';
   $dv .= '<li>' . $review['invMake']. $review['invModel']. '</li>';
  //  $dv .= '';
   
  }
$dv .= '</ul>';
  return $dv;
}


?>