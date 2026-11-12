<?php
/*
 * Runs once per container start, before Apache.
 * If the database has no PHP Motors tables yet, load the sample data from
 * sql/phpmotors.sql. An existing database is never touched.
 */
require (getenv('PHPMOTORS_APP_DIR') ?: '/var/www/html/phpmotors') . '/library/connections.php';

$sqlFile = getenv('PHPMOTORS_SEED_SQL') ?: '/opt/phpmotors/phpmotors.sql';

$host = phpmotorsEnv(['DB_HOST', 'MYSQLHOST'], 'mysql');
$port = phpmotorsEnv(['DB_PORT', 'MYSQLPORT'], '3306');
$name = phpmotorsEnv(['DB_NAME', 'MYSQLDATABASE'], 'phpmotors');
$user = phpmotorsEnv(['DB_USER', 'MYSQLUSER'], 'iClient');
$pass = phpmotorsEnv(['DB_PASSWORD', 'MYSQLPASSWORD'], '');

$db = null;
for ($try = 1; $try <= 30 && !$db; $try++) {
  try {
    $db = new PDO("mysql:host=$host;port=$port;dbname=$name;charset=utf8mb4", $user, $pass,
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
  } catch (PDOException $e) {
    fwrite(STDERR, "seed: waiting for database ($try/30): {$e->getMessage()}\n");
    sleep(2);
  }
}
if (!$db) {
  fwrite(STDERR, "seed: database not reachable, skipping sample data\n");
  exit(0);
}

if ($db->query("SHOW TABLES LIKE 'inventory'")->fetch()) {
  fwrite(STDERR, "seed: database already has data, nothing to do\n");
  exit(0);
}

fwrite(STDERR, "seed: empty database, loading sample data\n");
$db->exec(file_get_contents($sqlFile));
$count = $db->query('SELECT COUNT(*) FROM inventory')->fetchColumn();
fwrite(STDERR, "seed: done, $count vehicles loaded\n");
