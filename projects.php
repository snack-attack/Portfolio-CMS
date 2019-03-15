<?php
require_once './database.php';


$sql = "SELECT * FROM `project`;";
$query = $db->prepare($sql);
$query->execute();
$projects = $query->fetchAll();

$sql = "SELECT *, `project_id` FROM `tag`;
        JOIN `project_tag` ON `tag_id`=`tag`.`id`
        JOIN `project` ON `project_id`=`project`.`id`";
$query = $db->prepare($sql);
$query->execute();
$tags = $query->fetchAll();

var_dump($tags);

foreach($projects as $project) {
    echo '<div class="work-card"><div class="meta"><img src="" class="photo"><div class="description"><h2>'. $project['title']. '</h2><h4>'; 
    //check project id 
    if($project['id'] == ) {
        foreach($tags as $tag) {
            echo $tag['name'];
        }
    }
    echo '</h4><p>' . $project['description'] . '</p><p class="read-more"><a href="' . $project['site_url'] . '">Visit Site</a></p></div></div></div>';
}