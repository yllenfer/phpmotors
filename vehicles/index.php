<?php 

//"Vehicle Controller"

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicle model
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



  $classList = '<select class="dropdown-menu" id="classification-list">';
$classList .= '<option selected disabled>Choose a classification</option>';
foreach ($classifications as $classification) {
  $classList .= '<option value="';
  $classList .= "$classification[classificationId]";
  $classList .='"';
  $classList .=">$classification[classificationName]</option>"; 
}
$classList .= '</select>';





$action = filter_input(INPUT_GET, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_POST, 'action');
 }

 switch ($action) {
    // case 'add-vehicle':
    //     include '../view/add-vehicle.php';
    //    break;

    case "addVehicle":
        $invId = filter_input(INPUT_POST, 'invId');
        $invMake = filter_input(INPUT_POST, 'invMake');
        $invModel = filter_input(INPUT_POST, 'invModel ');
        $invDescription = filter_input(INPUT_POST, 'invDescription');
        $invImage = filter_input(INPUT_POST, 'invImage');
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
        $invPrice= filter_input(INPUT_POST, 'invPrice');
        $invStock = filter_input(INPUT_POST, 'invStock');
        $invColor = filter_input(INPUT_POST, 'invColor');

    
        if(empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) ||  empty($invThumbnail) ||  empty($invPrice) ||  empty($invStock) ||  empty($invColor)){
            $message = "<p>Please provide information for all empty form fields.</p>";
            include '../view/add-vehicle.php';
            exit;

        }

        $outcome = regVehicle($invId, $invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor);
        if($outcome=== 1){
            $message = "<p>Your $invMake $invModel has been added successfully</p>";
            include '../view/add-vehicle.php';
            exit;
        }
        else {
            $message = "<p>Error</p>";
            include '../view/add-vehicle.php';
        }

        break;

        case 'add-vehicle':
        include '../view/add-vehicle.php';
        break;


        
    case "classification":
        $classificationName = filter_input(INPUT_POST, 'classificationName');

        if(empty($classificationName)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/add-classification.php';
            exit;
          }


        // Send the data to the model
        $regOutcome = regCar($classificationName);
        if($regOutcome === 1){
            header('Location: /phpmotors/vehicles/');
            exit;
        }
        else{
            $message = "<p>Error</p>";
            include '../view/add-classification.php';
            exit;
            
        }
            break;
  

       case 'add-classification':
         // Filter and store the data
         include '../view/add-classification.php';
         break;


         default:
        include '../view/vehicle-management.php';
       break;

  
 }
 

?>