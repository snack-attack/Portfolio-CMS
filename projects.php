<?php
require_once './database.php';


$sql = "SELECT * FROM `project`;";
$query = $db->prepare($sql);
$query->execute();
$projects = $query->fetchAll();

$sql = "SELECT tag`.`name` FROM `project`
        JOIN `project_tag` ON `project_id`=`project`.`id`
        JOIN `tag` ON `tag_id`=`tag`.`id`;";
$tags = $query->fetchAll();



foreach($projects as $project) {
    echo '<div class="work-card"><div class="meta"><img src="" class="photo"><div class="description"><h2>'. $project['title']. '</h2><h4>tags here</h4><p>' . $project['description'] . '</p><p class="read-more"><a href="' . $project['site_url'] . '">Visit Site</a></p></div></div></div>';
}