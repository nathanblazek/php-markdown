<?php
namespace ncb\tests;
use ncb\Regex;

class RegexTest extends \PHPUnit\Framework\TestCase {

    public function testCanBeCreated(){
        // Test to see if manual assignent works
        $regex = new Regex();
        $regex->name = 'TestName';
        $regex->regex = 'TestRegex';
        $regex->replacement = 'TestReplacement';
        $this->assertTrue($regex->name == 'TestName');
        $this->assertTrue($regex->regex == 'TestRegex');
        $this->assertTrue( $regex->replacement == 'TestReplacement');

        //Reset
        $regex = null;

        //Test Constructor
        $regex = new Regex('TestName','TestRegex','TestReplacement');
        $this->assertTrue($regex->name == 'TestName');
        $this->assertTrue($regex->regex == 'TestRegex');
        $this->assertTrue( $regex->replacement == 'TestReplacement');
    }
}