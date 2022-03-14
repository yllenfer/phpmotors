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
   $dv .= "<img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
   $dv .= '<hr>';
   $dv .= "<h2>$vehicle[invMake] $vehicle[invModel]</h2>";
   $dv .= "<span>$vehicle[invPrice]</span>";
   $dv .= '</li>';
  }
  $dv .= '</ul>';
  return $dv;
 }
?>