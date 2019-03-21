<?php

require_once '../projects.functions.php';

use PHPUnit\Framework\TestCase;

class TestProjectsFunctions extends TestCase
{
    public function testAlternateClass_workCardAlt()
    {   
        $count = 3; 
        $class = alternateClass($count);
        $this->assertEquals('work-card alt', $class);
    }

    public function testAlternateClass_workCard()
    {
        $count = 2;
        $class = alternateClass($count);
        $this->assertEquals('work-card', $class);
    }

    // public function testShowProjects()
    // {

    // }
}