<?php
require_once './database.php';

//get projects
$sql = "SELECT `id`, `title` FROM `project`;";
$query = $db->prepare($sql);
$query->execute();
$projects = $query->fetchAll();

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/adminPanel.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <h1>Welcome to the Admin Panel!</h1>
        <table>
            <caption>Projects</caption>
            <thead>
                <tr>
                    <th scope="col">Project Title</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($projects as $project) {
                        echo '<tr><td data-label="Title">';
                        echo $project['title'];
                        echo '</td>
                            <td>
                                <a href="projectForm.php?' . $project['id']; echo '">Edit</a>
                                <a href="projectForm.php?' . $project['id']; echo '" id="delete">Delete</a>
                            </td>
                        </tr>';
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>