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


