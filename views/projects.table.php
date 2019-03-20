<?php

require_once '../database.php';
require_once '../Project.php';


$projects = getProjectTitles($db);

foreach($projects as $project) {
    echo '<tr><td data-label="Title">';
    echo $project['title'];
    echo '</td>
        <td>
            <a href="projectForm.php?id=' . $project['id'] . '">Edit</a>
            <a href="projectForm.php?id=' . $project['id'] . '" id="delete">Delete</a>
        </td>
    </tr>';
}