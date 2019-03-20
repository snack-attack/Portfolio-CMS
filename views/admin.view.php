<?php
    require_once 'snippets/header.php';
?>
<h1>Welcome to the Admin Panel!</h1>
    <table>
        <div class="thead">
            <h3>Projects</h3>
            <a href="./projectForm.php" class="createNew">Create New Project</a>
        </div>
        <thead>
            <tr>
                <th scope="col">Project Title</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once './snippets/projects.table.php';
            ?>
        </tbody>
    </table>
<?php
    require_once 'snippets/footer.php';
    