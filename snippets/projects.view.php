<?php
require_once 'database.php';
require_once 'projects.functions.php';
$db = connectDB();
$projects = getProjects($db);

if (!empty($projects)) {
    foreach($projects as $project) {
        echo '<div class="';
        //alternate classes so the card style switches every other project
        if ($project['id'] % 2 == 0) { 
            echo 'work-card';
        } else { echo 'work-card alt';}
        echo '"><div class="meta"><img src="./assets/img/workcard-backgrounds/';
        //display a random photo
        echo rand(1, 47);
        echo '.jpg" class="photo" alt="photo of colored stucco-like texture"></div><div class="description"><h2>'. $project['title']. '</h2><h4>'; 
        echo '</h4><p>' . $project['description'] . '</p><p class="read-more"><a href="' . $project['site_url'] . '">Visit Site</a></p></div></div></div>';
    }
}