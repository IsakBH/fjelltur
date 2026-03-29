<?php
$host = 'DB_HOST';
$username = 'DB_USERNAME';
$password = 'DB_PASSWORD';
$database = 'DB';

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Tilkobling mislykket: " . $mysqli->connect_error);
}