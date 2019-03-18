<?php
require_once './database.php';

//get projects
$sql = "SELECT * FROM `project`;";
$query = $db->prepare($sql);
$query->execute();
$projects = $query->fetchAll();

//get tags
$sql = "SELECT * FROM `tag`;";
$query = $db->prepare($sql);
$query->execute();
$tags = $query->fetchAll();

//get project tag relationships
$sql = "SELECT *, `tag`.`name` as name FROM `project_tag`
        JOIN `tag` ON `tag_id`=`tag`.`id`;";
$query = $db->prepare($sql);
$query->execute();
$project_tags = $query->fetchAll();

// var_dump($projects);
// var_dump($tags);
// var_dump($project_tags);

foreach($projects as $project) {
    echo '<div class="';
    //alternate classes so the card style switches every other project
    if ($project['id'] % 2 == 0) { 
        echo 'work-card';
    } else { echo 'work-card alt';}
    echo '"><div class="meta"><img src="./assets/img/workcard-backgrounds/';
    //display a random photo
    echo rand(1, 47);
    echo '.jpg" class="photo" alt="photo of colored stucco-like texture"><div class="description"><h2>'. $project['title']. '</h2><h4>'; 
    //check tags and display if any
    $counter = 0;
    foreach($project_tags as $project_tag) {
        if ($project_tag['project_id'] == $project['id']) {
            $counter = $counter++;
            if ( $counter > 1 ) {
                echo ' ,' . $project_tag['name'];
            } else { 
                echo $project_tag['name']; 
            }
            return $counter;
        }
    }
    echo '</h4><p>' . $project['description'] . '</p><p class="read-more"><a href="' . $project['site_url'] . '">Visit Site</a></p></div></div></div>';
}