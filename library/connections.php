<?php

/*
* Connector for the phpmotors database.
* Settings come from environment variables so the same code runs locally
* (docker compose) and on a host like Railway. DB_* variables win; Railway's
* MySQL plugin variables (MYSQLHOST, ...) are used as a fallback.
*/
function phpmotorsEnv($names, $default) {
  foreach ($names as $name) {
    $value = getenv($name);
    if ($value !== false && $value !== '') {
      return $value;
    }
  }
  return $default;
}

function phpmotorsConnect(){
  $server   = phpmotorsEnv(['DB_HOST', 'MYSQLHOST'], 'mysql');
  $port     = phpmotorsEnv(['DB_PORT', 'MYSQLPORT'], '3306');
  $dbname   = phpmotorsEnv(['DB_NAME', 'MYSQLDATABASE'], 'phpmotors');
  $username = phpmotorsEnv(['DB_USER', 'MYSQLUSER'], 'iClient');
  $password = phpmotorsEnv(['DB_PASSWORD', 'MYSQLPASSWORD'], '');
  $dsn = "mysql:host=$server;port=$port;dbname=$dbname;charset=utf8mb4";
  $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

  try {
    $link = new PDO($dsn, $username, $password, $options);
    return $link;
  } catch(PDOException $e) {
    error_log('phpmotors DB connection failed: ' . $e->getMessage());
    header('Location: /phpmotors/view/500.php');
    exit;
  }
}

?>
