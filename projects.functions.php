<?php
require_once 'database.php';
$db = connectDB();

function getProjectTitles($db) {
    $sql = "SELECT `id`, `title` FROM `project`;";
    $query = $db->query($sql);
    return $query->fetchAll();
}

function getProjects($db) {
    $sql = "SELECT `id`, `title`, `description`, `site_url`, `code_url` FROM `project`;";
    $query = $db->query($sql);
    return $query->fetchAll();
}

function getProject($db) {
    if (!empty($_GET['id'])) {
        $projectId = $_GET['id'];
        $sql = "SELECT `id`, `title`, `description`, `site_url`, `code_url` FROM `project`
                WHERE `id`=:projectId;";
        $query = $db->prepare($sql);
        $query->bindParam(':projectId', $projectId);
        $query->execute();
        return $query->fetch();
    }
}

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
    
        $result = $query->execute();

        if ($result) { 
            header('Location: admin.view.php');
        } else { 
            echo 'Oops! Something went wrong. Please try again.'; 
        }
    }
}

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
                header('Location: admin.view.php');
            } else { 
                echo 'Oops! Something went wrong. Please try again.'; 
            }
        }
    }
}

function deleteProject($db) {
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
            header('Location: admin.view.php');
        } else { 
            echo 'Oops! Something went wrong. Please try again.'; 
        }
    } 
}

function alternateClass(int $count): string {
    if ($count % 2 == 0) { 
        return 'work-card';
    } else { 
        return 'work-card alt';
    }
}

function shufflePhotoNumbers() {
   $range = range(1, 47);
   shuffle($range);
   return $range;
}

function showProjects($projects) {
    if (!empty($projects)) {
        $count = 0;
        foreach($projects as $project) {
            $count++;
            $range = shufflePhotoNumbers();
            echo '<div class="' . alternateClass($count) . '"><div class="meta"><img src="./assets/img/workcard-backgrounds/' . 
            array_pop($range) . '.jpg" class="photo" alt="photo of colored stucco-like texture"></div><div class="description"><h2>'. 
            $project['title']. '</h2><h4>'; 
            echo '</h4><p>' . $project['description'] . '</p><p class="read-more"><a href="' . $project['site_url'] . '">Visit Site</a></p></div></div></div>';
        }
    }
}