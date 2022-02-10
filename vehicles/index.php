<?php 

//"Accounts Controller"

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/vehicle-model.php';

  // Get the array of classifications
	$classifications = getClassifications();
  // Build a navigation bar using the $classifications array
  $navList = '<nav><div id="navbar"><ul>';
  $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
  foreach ($classifications as $classification) {
   $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
   
  }
  $navList .= '</ul></div></nav>';

  $regOutcome = regCar($classificationName);


$action = filter_input(INPUT_GET, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_POST, 'action');
 }

 switch ($action) {
    case 'add-vehicle';
    include '../view/add-vehicle.php';
     break;

     case 'add-classification';
    include '../view/add-classification.php';
     break;
   
    case 'vehicle-management';
    include '../view/vehicle-management.php';
     break;
  
  default:
   include '../view/home.php';
  break;
  
  
 }
 

?>