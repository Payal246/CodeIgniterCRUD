<?php 
require_once("C:/xampp/htdocs/payal/CodeIgniterCRUD/vendor/autoload.php");

$google=new Google_Client();


$google->setClientId('499262245649-le7qvr7321dvrqqe307ahhmabhjl57u4.apps.googleusercontent.com');
$google->setClientSecret('st7OZ5FHjvHtlAwK0pKaWQQK');
$google->setredirectUri('http://localhost/payal/CodeIgniterCRUD/Userc/dashboard');
$google->addScope('email');
$google->addScope('profile');
session_start();

?>