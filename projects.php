<?php
require_once './database.php';


$sql = "SELECT * FROM `project`;";
$query = $db->prepare($sql);
$query->execute();
$projects = $query->fetchAll();

$sql = "SELECT * FROM `tag`;";
$query = $db->prepare($sql);
$query->execute();
$tags = $query->fetchAll();



foreach($projects as $project) {
    echo '<div class="work-card"><div class="meta"><img src="" class="photo"><div class="description"><h2>'. $project['title']. '</h2><h4>'; 
    foreach($tags as $tag) {
        echo $tag['name'];
    }
    echo '</h4><p>' . $project['description'] . '</p><p class="read-more"><a href="' . $project['site_url'] . '">Visit Site</a></p></div></div></div>';
}