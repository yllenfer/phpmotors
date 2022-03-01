<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Motors | Template</title>
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
                <?php if(isset($cookieFirstname)){
                echo "<span class='welcome'>Welcome,  $cookieFirstname</span>";
                 } ?>
                    <a id="account" href="/phpmotors/accounts/index.php?action=login" title="Login or Register with PHP Motors">My Account</a>
                    
                </div>
            
        </header>