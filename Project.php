<?php
require_once 'database.php';

class Project {
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

//get projects
function getProjects($db) {
    $sql = "SELECT `id`, `title`, `description`, `site_url`, `code_url` FROM `project`;";
    $query = $db->prepare($sql);
    $query->execute();
    $projects = $query->fetchAll();

    return $projects;
}

//add projects to db
function addProject($db) {
    if (!empty($_POST['title']) && !empty($_POST['description'])) {
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        if (!empty($_POST['site_url'])) {
            $site_url = filter_var($_POST['site_url'], FILTER_VALIDATE_URL);
        }
        if (!empty($_POST['code_url'])) {
            $code_url = filter_var($_POST['code_url'], FILTER_VALIDATE_URL);
        }
        
        $sql = "INSERT INTO `project` (`title`, `description`, `site_url`, `code_url`) 
            VALUES (:title, :description, :site_url, :code_url);";
        $query = $db->prepare($sql);
        $query->bindParam(':title', $title); 
        $query->bindParam(':description', $description);
        $query->bindParam(':site_url', $site_url); 
        $query->bindParam(':code_url', $code_url); 
        
        $query->execute();
    }
}

//edit projects
function editProject($db) {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        if (!empty($_POST['title']) && !empty($_POST['description'])) {
            $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            if (!empty($_POST['site_url'])) {
                $site_url = filter_var($_POST['site_url'], FILTER_VALIDATE_URL);
            }
            if (!empty($_POST['code_url'])) {
                $code_url = filter_var($_POST['code_url'], FILTER_VALIDATE_URL);
            }
        
            $sql = "UPDATE `project` SET `title`=:title, `description`=:description, `site_url`=:site_url, `code_url`=:code_url 
            WHERE `id`=:id;";
    
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id);
            $query->bindParam(':title', $title); 
            $query->bindParam(':description', $description);
            $query->bindParam(':site_url', $site_url); 
            $query->bindParam(':code_url', $code_url); 
        
            $result = $query->execute();

            if ($result) {
                header('Location:admin.php');
            }
        }
    }
}
}
    


