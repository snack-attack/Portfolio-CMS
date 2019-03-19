<?php

include_once './database.php';

if (!empty($_GET)) {
    $id = $_GET['id'];


    $sql = "UPDATE `project` SET `title`=:title, `description`=:description, `site_url`=:site_url, `code_url`=:code_url 
    WHERE `id`=:id;";

    $query = $db->prepare($sql);
    $query->bindParam(':id', $id);
    $query->bindParam(':title', $title); 
    $query->bindParam(':description', $description);
    $query->bindParam(':site_url', $site_url); 
    $query->bindParam(':code_url', $code_url); 

    $result = $query->execute();
    header('Location:admin.php')
} 