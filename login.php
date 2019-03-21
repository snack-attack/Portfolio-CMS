<?php

define('USERNAME', 'audrey');
define('PASSWORD', '$2y$10$TdIbbxTzrqo.DIgWPHw7t.Q1ZDLzzxHwPw.RBhVHVuIxL/eKoCp3O');

if (!empty($_POST['uname']) && !empty($_POST['psw'])) {
    $username = $_POST['uname'];
    $password = $_POST['psw'];
    session_start();
    if ($username == USERNAME && password_verify($password, PASSWORD)) {
        $_SESSION['loggedIn'] = true;

        header('Location: admin.view.php');
    } else {
        header('Location: index.php');
    }
} else {
    echo 'Username or password not provided.';
};