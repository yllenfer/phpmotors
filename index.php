<?php 

//"Main PHP Motors Model"

// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';



  // Get the array of classifications
	$classifications = getClassifications();


  // Build a navigation bar using the $classifications array
 $navList = '<ul>';
 $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
 foreach ($classifications as $classification) {
  $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
  
 }
 $navList .= '</ul>';

// TODO: I need to understand how to display the nav for the template 

// $navList2 = '<ul>';
// $navList2 .= "<li><a href='/phpmotors/view/template.php' title='View the PHP Motors home page'>Home</a></li>";
// foreach ($classifications as $classification) {
//  $navLis2t .= "<li><a href='/phpmotors/view/template.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
 
// }
// $navList2 .= '</ul>';



$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

 switch ($action){
  case 'view/template.php':
   
   break;
  
  default:
   include 'view/home.php';
 }

 

?>