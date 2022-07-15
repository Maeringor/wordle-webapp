<?php

/* Das ist die Config File für alle wichtigen Attribute.
   Darunter fallen z.b. PORTS, Passwörter, Datenbank connections, etc.
   Aber auch für functions die allgemein benötigt werden. */

// Datenbank Connection
$DB_SERVERNAME = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME = "wordle";

if (session_status() === PHP_SESSION_NONE) {
   session_start();
   if(!isset($_SESSION["CEASAR_KEY"])) {
      $_SESSION["CEASAR_KEY"] = rand(1, 25);
   }
}

// Web Connection
$WEB_PROTOCOL = 'http';
// url as name (www.example.com) or as ip (127.0.0.1)
$WEB_URL = 'localhost';
$WEB_PORT = $_SERVER['SERVER_PORT'];

// Web-Server Configs
$root_path = $_SERVER['DOCUMENT_ROOT'];
$self_path = $_SERVER['PHP_SELF'];

// auto link to a page
function redirect($link_to_page) {
   header("Location: ".$link_to_page);
   exit();
}

?>