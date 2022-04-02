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

require_once '../model/uploads-model.php';

require_once '../model/reviews-model.php';

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
        $regOutcome = addVehicle($classificationId, $invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor);
        if($regOutcome ===1){
            $message = "<p class='noticeSuccess'>Your $invMake $invModel has been added successfully</p>";
            include '../view/add-vehicle.php';
            '<script>$(".formAddVehicle")[0].reset();</script>'; 
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
    
        
    case "add-classification":
        $classificationName = filter_input(INPUT_POST, 'classificationName');

        if(empty($classificationName)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/add-classification.php';
            exit;
          }


        // Send the data to the model
        $regOutcome = regCar($classificationName);
        if($regOutcome === 1){
        $message = "<p class='noticeSuccess'>Congratulations, the $classificationName classification was successfully added.</p>";
        $_SESSION['message'] = $message;
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
        $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        
        if (empty($classificationId) || empty($invMake) || empty($invModel) 
        || empty($invDescription) || empty($invImage) || empty($invThumbnail)
        || empty($invPrice) || empty($invStock) || empty($invColor)) {
      $message = '<p>Please complete all information for the item! Double check the classification of the item.</p>';
         include '../view/vehicle-update.php';
     exit;
    }
    
    $updateResult = updateVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId, $invId);
    if ($updateResult) {
     $message = "<p class='noticeSuccess'>Congratulations, the $invMake $invModel was successfully updated.</p>";
        $_SESSION['message'] = $message;
        header('location: /phpmotors/vehicles/');
        exit;
    } else {
        $message = "<p class='notice'>Error. the $invMake $invModel was not updated.</p>";
         include '../view/vehicle-update.php';
         exit;
        }
    break;

 


    case 'getInventoryItems': 
    // Get the classificationId 
    $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
    // Fetch the vehicles by classificationId from the DB 
    $inventoryArray = getInventoryByClassification($classificationId); 
    // Convert the array to a JSON object and send it back 
    echo json_encode($inventoryArray); 
    break;


    case 'mod':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if(count($invInfo)<1){
            $message = 'Sorry, no vehicle information could be found.';
           }
        include '../view/vehicle-update.php';
        break;

    case 'del':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if (count($invInfo) < 1) {
                $message = 'Sorry, no vehicle information could be found.';
            }
            include '../view/vehicle-delete.php';
            exit;
            break;

    case 'det':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInventoryByInvId($invId);
        if(count($invInfo)<1){
            $message = 'Sorry, no vehicle information could be found.';
           }
        // echo $invId;
        // exit;
        include '../view/vehicle-detail.php';
        break;


case 'deleteVehicle':
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
    
    $deleteResult = deleteVehicle($invId);
    if ($deleteResult) {
        $message = "<p class='notice'>Congratulations the, $invMake $invModel was successfully deleted.</p>";
        $_SESSION['message'] = $message;
        header('location: /phpmotors/vehicles/');
        exit;
    } else {
        $message = "<p class='notice'>Error: $invMake $invModel was not deleted.</p>";
        $_SESSION['message'] = $message;
        header('location: /phpmotors/vehicles/');
        exit;
    }
    break;


    case 'classification':
        $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_STRING);
        $vehicles = getVehiclesByClassification($classificationName);

        if(!count($vehicles)){
            $message = "<p class='notice'>Sorry, no $classificationName vehicles could be found.</p>";
          } else {
            $vehicleDisplay = buildVehiclesDisplay($vehicles);
            
            
          }

         // echo $vehicleDisplay;
            //exit;

         include '../view/classification.php';

          
        break;


    case 'detail':

        $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $reviewDate = filter_input(INPUT_POST, 'reviewDate', FILTER_SANITIZE_STRING);
        $invMake = filter_input(INPUT_GET, 'invMake', FILTER_SANITIZE_STRING);
        $invModel = filter_input(INPUT_GET, 'invModel', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_GET, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_GET, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_GET, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_GET, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_GET, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invColor = filter_input(INPUT_GET, 'invColor', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $reviewText = filter_input(INPUT_GET, 'reviewText', FILTER_SANITIZE_STRING);
        $clientId = filter_input(INPUT_GET, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        $clientId = $_SESSION['clientData']['clientId'];
        $reviews = getReviewInfo($invId);
        $reviewDate = filter_input(INPUT_POST, 'reviewDate', FILTER_SANITIZE_NUMBER_INT);
        $vehicles = getInvItemInfo($invId);
        $thubmnails = getVehiclesByThubmnail($invId);
        $buildThubmnails = buildVehicleThumbnail($thubmnails);
        $buildReviewsForm = buildReviews($invId, $clientId, $clientFirstname, $clientLastname);
        //$myReviews works with the review from the admin
        $myReviews = getReviewInfo($invId);
        $buildMyReview = manageReview($myReviews);
        $vehicleDisplay = buildVehiclesInfo($vehicles);
        $reviews = getReviewInfo($invId);
        $myReviews = getReviewInfo($invId);
        $buildMyReview = manageReview($myReviews);

        if(count($reviews) > 1){
            $reviewTitle = "<h3 class='customerReviews'>Customer Reviews </h3>";
            $review = $buildReviewsInfo;
            

        }else {
            $review = "<h3>Be the first one to leave a review </h3>"; 
        }

        


        
        $buildReviewsInfo = getVehicleReview($reviews);
      
       
       $vehicles = getInvItemInfo($invId);
       $thumbnail = getVehiclesByThubmnail($invId);
       $reviewDisplay = buildReviews($invId, $clientId,  $_SESSION['clientData']['clientFirstname'], $_SESSION['clientData']['clientLastname']);

  
        if(!count($vehicles)){
            $message = "<p class='notice'>Sorry, no $vehicles could be found.</p>";
          } else {
            $vehicleDisplay = buildVehiclesInfo($vehicles);
            $thumbnailDisplay = buildVehicleThumbnail($thumbnail);
            
            
            
          }

        // echo "hello";
        //     exit;

        include 
       // $reviewDisplay = buildReviews($invId, $clientId);
        '../view/vehicle-detail.php';
        

         break;




         
       

    


         default:
        include '../view/vehicle-management.php';
       break;

  
 }

 



?>