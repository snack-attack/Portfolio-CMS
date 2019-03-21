<?php
require_once 'database.php';
require_once 'projects.functions.php';
$db = connectDB();
$projects = getProjects($db);

showProjects($projects);