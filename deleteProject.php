<?php

include_once './database.php';

if (!empty($_GET)) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `project_tag`
            WHERE `project_id`=:id;";
    
    $query = $db->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();

    $sql = "DELETE FROM `project` 
    WHERE `id`=:id;";

    $query = $db->prepare($sql);
    $query->bindParam(':id', $id);
    $result = $query->execute();

    if ($result) { 
        header('Location: admin.php');
    } else { 
        echo 'Oops! Something went wrong. Please try again.'; 
    }
} 