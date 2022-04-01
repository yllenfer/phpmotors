<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title><//?php if(isset($vehicles['invMake'])){ echo " $vehicles[invMake] $vehicles[invModel]";} ?> | PHP Motors</title> -->
    <link rel="stylesheet" href="/phpmotors/css/styles.css" type="text/css" media="screen">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play&family=Rajdhani&display=swap" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <header>
            
                <img src="/phpmotors/images/site/logo.png" alt="PHP Logo" id="logo">
                <div id="acc">
                <?php 
                if(isset($_SESSION['loggedin'])){
                echo "<span class='welcome'><a href='/phpmotors/accounts/'>Welcome</a>, " . $_SESSION['clientData']['clientFirstname'] . " | <a href='/phpmotors/accounts/index.php?action=logout' id='logout'>Log out</a> </span>";
                 } 
                 else{
                 echo "<a id='account' href='/phpmotors/accounts/index.php?action=login' title='Login or Register with PHP Motors'>My Account</a>";
                 }
                 ?>
                    
                </div>
        </header>