<?php 

//"Accounts Controller"

//Create or access a Session
session_start();
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';

require_once '../model/reviews-model.php';




  // Get the array of classifications
	$classifications = getClassifications();
  // Build a navigation bar using the $classifications array
  $navList = navigationList($classifications);



$action = filter_input(INPUT_GET, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_POST, 'action');
 }

 switch ($action) {

   case 'admin':


    include '../view/admin.php';

    break;  



  case 'login':
  $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
  $clientEmail = checkEmail($clientEmail);
  $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
  $passwordCheck = checkPassword($clientPassword);
 
  // var_dump($myReviews);
  // exit;

 
  
  
 

  // Run basic checks, return if errors
  if (empty($clientEmail) || empty($passwordCheck)) {
  $message = '<p class="notice">Please provide a valid email address and password.</p>';
  $_SESSION['message'] = $message;

  include '../view/login.php';
  exit;
  }
  
  // A valid password exists, proceed with the login process
  // Query the client data based on the email address
  $clientData = getClient($clientEmail);
  // Compare the password just submitted against
  // the hashed password for the matching client
  $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
  // If the hashes don't match create an error
  // and return to the login view
  if(!$hashCheck) {
    $message = '<p class="notice">Please check your password and try again.</p>';
    $_SESSION['message'] = $message;
    include '../view/login.php';
    exit;
  }
 
 if($_SESSION['loggedin'] = TRUE){
  
 }
  

 if($_SESSION['loggedin'] = False){
  include '../index.php';
}

  array_pop($clientData);
  // Store the array into the session
  $_SESSION['clientData'] = $clientData;
  // Send them to the admin view
  $message = "<p> </p>";
  $_SESSION['message'] = $message;
  
  $myReviews = getReviewInfoClient($_SESSION['clientData']['clientId']);
  // var_dump($myReviews);
  // exit;
  $buildMyReview = manageReview($myReviews);

  include '../view/admin.php';
  exit;

  // break;

 
  case 'register':
    // Filter and store the data
      $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
      $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
      $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
      $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
      //TODO: client email is not sticky when registering
      $clientEmail = checkEmail($clientEmail);
      $checkPassword = checkPassword($clientPassword);



      $existingEmail = checkExistingEmail($clientEmail);

      // Check for existing email address in the table
      if($existingEmail){
       $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
       $_SESSION['message'] = $message;

       include '../view/login.php';
       exit;
      }



    
    // Check for missing data
    if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/register.php';
      exit;
    }
    
    // Send the data to the model
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword);
    
    // Check and report the result
    if($regOutcome === 1){
      setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
      $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
      header('Location: /phpmotors/accounts/?action=login');
      exit;
    } else {
      $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
      include '../view/register.php';
      exit;
    }



    case 'logout':
      unset($_SESSION);
      session_destroy();
      setcookie('PHPSESSID', '', strtotime('-1 hour'), '/');
      header('Location: /phpmotors/index.php');
      exit;

      break;

      case 'accountUpdate':
       // Filter and store the data
      $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
      $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
      $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
      $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_EMAIL);
      $clientEmail = checkEmail($clientEmail);
      
     

        
      if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)){
      $message = "<p>Please complete all information for the item!</p>";
         include '../view/account-update.php';
     exit;
    }
    
    $updateResult = updateAccountInfo($clientFirstname, $clientLastname, $clientEmail, $clientId);
    if ($updateResult) {
     $message = "<p class='noticeSuccess'>$clientFirstname, your information has been updated</p>";
        $_SESSION['message'] = $message;

  $clientData = getClientInfo($clientId);
    array_pop($clientData);
   $_SESSION['clientData'] = $clientData;


   $myReviews = getReviewInfoClient($_SESSION['clientData']['clientId']);
  //  var_dump($myReviews);
  // exit;
   $buildMyReview = manageReview($myReviews);
 

  include '../view/admin.php';
  exit;


    } else {
        $message = "<p class='notice'>Error. Your information was not updated.</p>";
         include '../view/account-update.php';
         exit;
        }

  exit;
    break;


    case 'passwordUpdate':
   // Filter and store the data
   $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
   $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_EMAIL);
   $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
  $passwordCheck = checkPassword($clientPassword);
  $name = $_SESSION['clientData']['clientFirstname'];
   
  
   
     
   if(empty($passwordCheck)){
   $message = "<p class='notice'>Please enter a valid password, $name </p>";
      include '../view/account-update.php';
  exit;
 }
 
 $updateResult = updatePassword($clientFirstname, $clientPassword, $clientId);

 if ($updateResult) {
  $message = "<p class='noticeSuccess'>$name, your password has been updated</p>";
     $_SESSION['message'] = $message;

$clientData = getClientInfo($clientId);
 array_pop($clientData);
$_SESSION['clientData'] = $clientData;

$myReviews = getReviewInfoClient($_SESSION['clientData']['clientId']);
// var_dump($myReviews);
//   exit;

$buildMyReview = manageReview($myReviews);



include '../view/admin.php';
exit;


 } else {
     $message = "<p class='notice'>Error. Your information was not updated.</p>";
      include '../view/account-update.php';
      exit;
     }

exit;
 break;



    default:
    $myReviews = getReviewInfoClient($_SESSION['clientData']['clientId']);
  //   var_dump($myReviews);
  // exit;

    $buildMyReview = manageReview($myReviews);
  

    include '../view/admin.php';


   break;
 }
 

?>