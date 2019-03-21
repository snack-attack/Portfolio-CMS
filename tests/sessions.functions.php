<?php

require_once '../sessions.functions.php';

use PHPUnit\Framework\TestCase;

class TestSessionsFunctions extends TestCase
{
    public function testCheckSessionStatus_loggedIn()
    {
        
        $session = ['loggedIn' => true];
        $testSession = checkSessionStatus($session);

        $this->assertEquals(false, $testSession);
    }

    public function testCheckSessionStatus
}