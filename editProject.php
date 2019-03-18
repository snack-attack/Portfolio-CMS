<?php
require_once './database.php';

if(!empty($_POST['title']) && !empty($_POST['description'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    if(!empty($_POST['site_url'])) {
        $site_url = filter_var($_POST['site_url'], FILTER_VALIDATE_URL);
    }
    if(!empty($_POST['code_url'])) {
        $code_url = filter_var($_POST['code_url'], FILTER_VALIDATE_URL);
    }
    
    $sql = "INSERT INTO `project` (`title`, `description`, `site_url`, `code_url`) 
            VALUES (:title, :description, :site_url, :code_url);";
    $query = $db->prepare($sql);
    $query->bindParam(':title', $title); 
    $query->bindParam(':description', $description);
    $query->bindParam(':site_url', $site_url); 
    $query->bindParam(':code_url', $code_url); 

    $result = $query->execute();
}



