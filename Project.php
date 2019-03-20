<?php
require_once 'database.php';


//get projects
function getProjectTitles($db) {
    $sql = "SELECT `id`, `title` FROM `project`;";
    $query = $db->prepare($sql);
    $query->execute();
    $projects = $query->fetchAll();

    return $projects;
}

function getProject($db) {
    if (!empty($_GET['id'])) {
        $projectId = $_GET['id'];
        $sql = "SELECT `id`, `title`, `description`, `site_url`, `code_url` FROM `project`
                WHERE `id`=:projectId;";
        $query = $db->prepare($sql);
        $query->bindParam(':projectId', $projectId);
        $query->execute();
        $project = $query->fetch();
        
        return $project;
    }
}

    


