<?php
namespace ncb\tests;

use ncb\Markdown;
class MarkdownTest extends \PHPUnit\Framework\TestCase {

    public function testIsClassWorking(){
        $this->assertTrue(true);
    }
    public function testHeader(){
        $headerOne = Markdown::render('#Header');
        $headerTwo = Markdown::render('##Header');
        $headerSix = Markdown::render('######Header');
        $this->assertTrue($headerOne == "<h1>Header</h1>");
        $this->assertTrue($headerTwo == "<h2>Header</h2>");
        $this->assertTrue($headerSix == "<h6>Header</h6>");

    }

    public function testRegex() {
        foreach(Markdown::defaultRegex() as $regex){
            if($regex->result && $regex->example) {
                $result = Markdown::render($regex->example);
                $this->assertTrue(
                    $result == $regex->result,
                    $regex->name.' resulted in '.$result.' and '. $regex->result.' was expected'
                );
            }
        }
    }

    public function testCorrectNestingSampleOne(){
        $result = Markdown::render("*Testing of a **bold** word\n");
        $this->assertTrue($result == '<ul><li>Testing of a <strong>bold</strong> word</li></ul>',$result. 'was not the correct response');
    }
}