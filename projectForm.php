<?php
include_once 'database.php';

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
        <link rel="stylesheet" href="./css/projectForm.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <h1>Create a New Project</h1>
        <form method="POST" action="editProject.php">
            <div class="container">
                <label for="title">Project Title</label>
                <input type="text" placeholder="Enter Project Title" name="title" required>

                <label for="description">Description</label>
                <textarea placeholder="Enter Description" name="description" required></textarea>

                <label for="site_url">Site URL</label>
                <input type="url" placeholder="Enter Site URL" name="site_url"></input>

                <label for="code_url">Code URL</label>
                <input type="url" placeholder="Enter Site URL" name="code_url"></input>

                <label for="tags">Tags</label>
                <?php
                $sql = "SELECT `tag`.`name` as name FROM `tag`;";
                        $query = $db->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll();
                        foreach($results as $result) {
                            echo '<input type="radio" name='. $result['name'] . '>' . $result['name'] . '</input>';
                        }
                ?>

                <button type="submit">Submit</button>
            </div>
        </form> 
        <button type="button" class="cancel">Back to Admin Panel</button>
    </body>
</html>
