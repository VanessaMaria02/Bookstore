<?php
//öffnet Zugang zur Datenbank
$host = "localhost";
$dbuser = "hoteladmin";
$dbpassword = "hoteladmin";
$dbname = "buchhaus";

$db = new mysqli($host, $dbuser, $dbpassword, $dbname);
if ($db->connect_error) {
    echo "Connection Error: " . $db->connect_error;
    exit();
}
?>