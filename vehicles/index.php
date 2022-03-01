<?php 

//"Vehicle Controller"


//Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicle model
require_once '../model/vehicle-model.php';
//Get functions
require_once '../library/functions.php';

  // Get the array of classifications
	$classifications = getClassifications();

$navList = navigationList($classifications);







$action = filter_input(INPUT_GET, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_POST, 'action');
 }

 switch ($action) {
  

  case "addVehicle":
      $classificationId = filter_input(INPUT_POST, 'classificationId');
      $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING));
      $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING));
      $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING));
      $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING));
      $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING));
      $invPrice= trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
      $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT));
      $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING));
      

    
        if(empty($classificationId) || empty($invMake) || empty($invModel)  || empty($invDescription) || empty($invImage) ||  empty($invThumbnail) ||  empty($invPrice) ||  empty($invStock) ||  empty($invColor)){
            $message = "<p>Please provide information for all empty form fields.</p>";
            include '../view/add-vehicle.php';
            exit;

        }
        $regOutcome = regVehicle($classificationId, $invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor);
        if($regOutcome ===1){
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