<?php

function checkSessionStatus($session) {
    return ((empty($session['loggedIn']) || $session['loggedIn'] = false));
}