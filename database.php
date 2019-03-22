<?php

// Create a connection

function connectDB() {
    return $db = new PDO('mysql:host=192.168.20.20; dbname=portfolio-cms', 'root', '');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
