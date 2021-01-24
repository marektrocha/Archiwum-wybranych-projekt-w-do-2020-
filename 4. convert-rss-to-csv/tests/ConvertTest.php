<?php

declare(strict_types=1);

use MarekTrochaRekrutacjaHRtec\Convert;
use PHPUnit\Framework\TestCase;

require_once("src/convert.php");

final class ConvertTest extends TestCase {
 
    public function testHeaderArray(): void {

        $convertTest = new Convert();
        $this->assertIsArray($convertTest->header, 'array');                    // Test header of array
    }

    public function testFieldsArray(): void {

        $convertTest = new Convert();
        $this->assertIsArray($convertTest->fields, 'array');                    // Test body of array
    }
    
    public function testLoaderW(): void {

        $convertTest = new Convert();
        $type = "w+";                                                           // Type 'w+'
        $url = "https://blog.nationalgeographic.org/rss";                       // URL of RSS
        $path = "test.php";                                                     // Test file
 
        $this->assertEquals(true, $convertTest->loader($type, $url, $path));
    }

    public function testLoaderA(): void {

        $convertTest = new Convert();
        $type = "a+";                                                           // Type 'a+'
        $url = "https://blog.nationalgeographic.org/rss";                       // URL of RSS
        $path = "test.php";                                                     // Test file (add the same file test.php)
 
        $this->assertEquals(true, $convertTest->loader($type, $url, $path));
    }
 
}