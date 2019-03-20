<?php

require_once '../../database.php';
require_once '../../Project.php';
require_once 'header.php';

$addProject = 'addProject.php';
$editProject = 'editProject.php';

$project = getProject($db);

?>
        <h1>Create a New Project</h1>
        <form method="POST" action="<?php echo (!empty($_GET['id'])) ? $editProject . '?id=' . $project['id'] : $addProject; ?>">
            <div class="container">
                <label for="title">Project Title</label>
                <input type="text" placeholder="Enter Project Title" name="title" value="<?= $project['title'] ?? ''; ?>" required>

                <label for="description">Description</label>
                <textarea placeholder="Enter Description" name="description" required><?= $project['description'] ?? ''; ?></textarea>

                <label for="site_url">Site URL</label>
                <input type="url" placeholder="Enter Site URL" name="site_url" value="<?= $project['site_url'] ?? ''; ?>"></input>

                <label for="code_url">Code URL</label>
                <input type="url" placeholder="Enter Site URL" name="code_url" value="<?= $project['code_url'] ?? ''; ?>"></input>

                <button type="submit">Submit</button>
            </div>
        </form> 
        <div class="backHome">
            <a href="../admin.view.php" class="cancel">Back to Admin Panel</a>
        </div>
<?php
include_once 'footer.php';
