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


    /* * ********************************** 
    * Get vehicles by classificationId 
    * Used for starting Update & Delete process 
    * ********************************** */ 

    case 'updateVehicle':
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
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


    case 'getInventoryItems&classificationId':
        echo 'This is it';
        exit;


    case 'getInventoryItems': 
    // Get the classificationId 
    $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
    // Fetch the vehicles by classificationId from the DB 
    $inventoryArray = getInventoryByClassification($classificationId); 
    // Convert the array to a JSON object and send it back 
    echo json_encode($inventoryArray); 
    break;


    case 'mode':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if(count($invInfo)<1){
            $message = 'Sorry, no vehicle information could be found.';
           }
        include '../view/vehicle-update.php';
        break;


         default:
         $classificationList = buildClassificationList($classifications);
        include '../view/vehicle-management.php';
       break;

  
 }
 

?>