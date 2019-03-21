<?php

require_once 'database.php';
require_once 'projects.functions.php';
$db = connectDB();


if (!empty($_GET['id']) && !empty($_GET['action']))  {
    deleteProject($db);
} elseif (!empty($_GET['id'])) {
    editProject($db);
} else {
    addProject($db);
}