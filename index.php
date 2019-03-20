<?php

require_once './http/Request.php';
require_once './http/Router.php';
require_once 'Project.php';

function render($file, array $data) {
    require_once "./views/" . $file . ".view.php";
}

$router = new Router(new Request);
$project = new Project();

$router->get('/portfolio-cms', function($request) {
    $request = $request->getBody();
    $project = new Project();

    $data = $project->getProjectTitles($db);

    return render('index', $data);
});