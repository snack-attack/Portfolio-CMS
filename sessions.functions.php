<?php

function checkSessionStatus() {
    session_start();
    if (empty($_SESSION['loggedIn']) || $_SESSION['loggedIn'] = false) {
        header('Location: index.php');
    };
}