<?php

require_once '../projects.functions.php';

use PHPUnit\Framework\TestCase;

class TestProjectsFunctions extends TestCase
{
    const RANGE = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47];

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

    public function testShufflePhotoNumbers()
    {
        $range = shufflePhotoNumbers();

        $this->assertInternalType('array', $range);

        $this->assertCount(47, $range);
        $this->assertNotEquals($range, static::RANGE);

    }
}