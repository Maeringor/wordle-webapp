<?php

/* Das ist die Config File für alle wichtigen Attribute.
   Darunter fallen z.b. PORTS, Passwörter, Datenbank connections, etc.
   Aber auch für functions die allgemein benötigt werden. */

// Datenbank Connection
$DB_SERVERNAME = "";
$DB_USERNAME = "";
$DB_PASSWORD = "";

// Create connection
//$conn = new mysqli($servername, $username, $password);

// Check connection
/* if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
 */

 
// Web Connection
$WEB_PROTOCOL = 'http';
// url as name (www.example.com) or as ip (127.0.0.1)
$WEB_URL = 'localhost';
$WEB_PORT = '5555';

// Web-Server Configs
$root_path = $_SERVER['DOCUMENT_ROOT'];
$self_path = $_SERVER['PHP_SELF'];

// auto link to a page
function redirect($link_to_page) {
   header("Location: ".$link_to_page);
   exit();
}

?>