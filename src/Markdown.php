<?php
namespace ncb;

class Markdown
{
    private $defaultRegex;

    public function __construct()
    {
        $this->defaultRegex = array(
            new Regex('header', '/(#+)(.*)/',                 'self::header'),
            new Regex('bold',   '/(\*\*|__)(.*?)\1/',          '<strong>$2</strong>'),
            new Regex('link',   '/\[([^\[]+)\]\(([^\)]+)\)/',  '<a href="$2">$1</a>'),
            new Regex('rule',  '/\n-{5,}/',                   '<hr />'),
            new Regex('code',   '/`(.*?)`/',                   '<code>$1</code>')
        );
    }

    public function render($markdown){
        $result = $markdown;
        if($result){
            foreach($this->defaultRegex as $regex){
                if(is_callable($regex->replacement)){
                    $result = preg_replace_callback($regex->regex,$regex->replacement,$result);
                } else {
                    $result = preg_replace($regex->regex,$regex->replacement,$result);
                }
            }
        }
        return $result;
    }

    private static function header($matches){
        if($matches && count($matches)>2) {
            $size = strlen($matches[1]);
            return "<h$size>$matches[2]</h$size>";
        }
    }

}