<?php
$host = 'DB_HOST';
$username = 'DB_USERNAME';
$password = 'DB_PASSWORD';
$database = 'DB';

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Tilkobling mislykket: " . $mysqli->connect_error);
}

define('GOOGLE_CLIENT_ID', '');
define('GOOGLE_CLIENT_SECRET', '');
define('GOOGLE_REDIRECT_URI', 'http://localhost/fjelltur/pages/google-callback.php');