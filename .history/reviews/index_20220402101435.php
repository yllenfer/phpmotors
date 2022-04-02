<?php //"Reviews Controller"


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

require_once '../model/reviews-model.php';

require_once '../model/vehicle-model.php';

require_once '../model/uploads-model.php';





  // Get the array of classifications
	$classifications = getClassifications();

$navList = navigationList($classifications);







$action = filter_input(INPUT_GET, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_POST, 'action');
 }

 switch ($action) {



    case "addReview":

        $reviewId = filter_input(INPUT_POST, 'reviewId');
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
        $reviewDate = filter_input(INPUT_POST, 'reviewDate', FILTER_SANITIZE_STRING);
        $invId = (filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT));
        $clientId = (filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT));
        $clientFirstname = (filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
        $clientLastname = (filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
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
     
        

       
            
      
      
          if(empty($reviewText)){
              $message = "<p class='notice'>Please provide information for all empty form fields.</p>";
              include '../view/vehicle-detail.php';
              exit;
  
          }

          $regOutcome = addReview($reviewText, $invId, $clientId);
          if($regOutcome ===1){ 
            
            $message = "<p class='noticeSuccess'>Your review has been added successfully</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/?action=detail&invId=' . $invId);
            exit;
        }
        else {
            $message = "<p>Error</p>";
            include '../view/vehicle-detail.php';
        }

        break;

        case 'addReview':
            // Filter and store the data
            include '../view/vehicle-detail';
            break;
   

case 'displayReview':
    $reviewText = (filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING));
    
    

    break;




    case 'mod':
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);
        $reviewInfo = getReviewItemInfo($reviewId);
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        //$invInfo = getInvItemInfoReview($invId);
        if(count($reviewInfo)<1){
            $message = 'Sorry, no vehicle information could be found.';
           }
        include '../view/review-update.php';
        break;

    case 'del':
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);
        $reviewInfo = getReviewItemInfo($reviewId);
        if (count($reviewInfo) < 1) {
                $message = 'Sorry, no vehicle information could be found.';
            }
            include '../view/review-delete.php';
            exit;
            break;

    case 'deleteReview':
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
        
        $deleteResult = deleteReview($reviewId);
        if ($deleteResult) {
            $message = "<p class='notice'>Congratulations your review was successfully deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/');
            exit;

        } else {
            $message = "<p class='notice'>Error: Your review was not deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/');
            exit;
        }
        break;
            

        case 'reviewUpdate':
            $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
            $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
        
            $updateResult = updateReview($reviewId, $reviewText);
            if ($updateResult) {
                $message = "<p class='notice'>Congratulations your review was successfully updated.</p>";
                $_SESSION['message'] = $message;
                header('location: /phpmotors/accounts/');
                exit;
    
            } else {
                $message = "<p class='notice'>Error: Your review was not updated.</p>";
                $_SESSION['message'] = $message;
                header('location: /phpmotors/accounts/');
                exit;
            }
            break;






    default:
    
   include
    '../view/vehicle-detail.php';
    

    

  break;



 }




 
  
?>