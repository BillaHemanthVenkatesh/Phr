<?php 
// DB credentials.
//define('DB_HOST','localhost');
//define('DB_USER','root');
//define('DB_PASS','');
//define('DB_NAME','hmmsdb');

//$user = 'root';
//$pass = 123;
//$inst = 'e-pulsar-335413:us-central1:phr';
//$db = hmmsdb;


//$dbh = mysqli_connect(null,$user,$pass,$db,null,$inst)

// DB credentials.
define('DB_HOST','3.95.165.63');
define('DB_USER','user');
define('DB_PASS','hello');
define('DB_NAME','hmmsdb');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

?>