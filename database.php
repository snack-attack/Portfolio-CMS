<?php

$db_server = 'mysql:host=192.168.20.20';
$db_username = 'root';
$db_password = '';
$db_database = 'portfolio-cms';

// Create a connection
$db_connection = new PDO($db_server, $db_database, $db_username, $db_password);
$db_connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Check the connection
if ($db_connection->connect_error) {
    die("Connection failed");
}