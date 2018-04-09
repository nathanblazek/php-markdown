<?php
namespace ncb\tests;

use ncb\Markdown;
class MarkdownTest extends \PHPUnit\Framework\TestCase {
    private $markdown;

    public function  setUp(){
        $this->markdown = new Markdown();
    }

    public function testIsClassWorking(){
        $this->assertTrue(true);
    }
    public function testHeader(){
        $headerOne = $this->markdown->render('#Header');
        $headerTwo = $this->markdown->render('##Header');
        $headerSix = $this->markdown->render('######Header');
        $this->assertTrue($headerOne == "<h1>Header</h1>");
        $this->assertTrue($headerTwo == "<h2>Header</h2>");
        $this->assertTrue($headerSix == "<h6>Header</h6>");

    }

    public function testBold(){
        $bold = $this->markdown->render('**Bold Test**');
        $this->assertTrue($bold == '<strong>Bold Test</strong>');
    }
    //link, rule, code

    public function testLink(){
        $link = $this->markdown->render('[Link](http://www.google.com)');
        $this->assertTrue($link == '<a href="http://www.google.com">Link</a>');
    }
    public function testRule(){
        $rule = $this->markdown->render("\n--------");
        $this->assertTrue($rule == '<hr />');
    }

    public function testCode(){
        $code = $this->markdown->render("`Test Code`");
        $this->assertTrue($code == '<code>Test Code</code>');
    }
}