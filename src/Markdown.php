<?php
namespace ncb;

class Markdown
{

    public static function defaultRegex(){
        //Regex Params are:Name,regex,replacement,example,result
        return array(
            new Regex(
                'header',             //Name
                '/(#+)(.*)/',         //Regular Expression
                'self::header',  //Replacement text/function
                '#Header',          //Example of Markdown (for testing/documentation needs)
                '<h1>Header</h1>'     //Example of output (for testing/documentation needs)
            ),
            new Regex(
                'bold',
                '/(\*\*|__)(.*?)\1/',
                '<strong>$2</strong>',
                '**Bold**',
                '<strong>Bold</strong>'
            ),
            new Regex(
                'link',
                '/\[([^\[]+)\]\(([^\)]+)\)/',
                '<a href="$2">$1</a>',
                '[Test](http://www.nateblazek.com)',
                '<a href="http://www.nateblazek.com">Test</a>'
            ),
            new Regex(
                'rule',
                '/\n-{5,}/',
                '<hr />',
                "\n----------",
                '<hr />'
            ),
            new Regex(
                'code',
                '/`(.*?)`/',
                '<code>$1</code>',
                '`Test Code`',
                '<code>Test Code</code>'
            ),
            new Regex(
                'italics',
                '/(\*|_)(.*?)\1/',
                '<em>$2</em>',
                '*Italics*',
                '<em>Italics</em>'
            ),
            new Regex(
                'blockquote',
                '/\n(&gt;|\>)(.*)/',
                "\n<blockquote>$2</blockquote>",
                "\n>Blockquote",
                "\n<blockquote>Blockquote</blockquote>"
            ),
            new Regex(
                'Unordered List',
                '/((?:\*.*\n)+)/',
                'self::list_ul',
                "*Unordered List Item\n",
                "<ul><li>Unordered List Item</li></ul>"
            ),
            new Regex(
                'Ordered List',
                '/((?:[0-9]+\..*\n)+)/',
                'self::list_ol',
                "345.Ordered List Item\n",
                "<ol><li>Ordered List Item</li></ol>"
            ),
            new Regex(
                'Paragraph',
                '/\n([^\n]+)\n/',
                'self::paragraph',
                "\nThis is a sample of text!\n",
                '<p>This is a sample of text!</p>'
            ),
            new Regex(
                'Javascript Cleanup to prevent injection',
                '/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/i',
                '',
                "<script>alert('HAHAHAHA!');</script>",
                ''
            )
        );
    }

    public static function render($markdown){
        $result = $markdown;
        if($result){
            foreach(self::defaultRegex() as $regex){
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
    private static function list_ul($matches){
        $result = null;
        if($matches){
            $result = preg_replace('/\*(.*)/m','<li>$1</li>',$matches[0]);
        }
        return "<ul>\n".$result.'</ul>';
    }
    private static function list_ol($matches){
        $result = null;
        if($matches){
            $result = preg_replace('/^[0-9]*\.(.*)/m','<li>$1</li>',$matches[0]);
        }
        return "<ol>\n".$result.'</ol>';
    }
    private static function paragraph($matches)
    {
        if ($matches && count($matches) > 1) {
            if (!preg_match('/^<\/?(h|p|bl|ul|ol|li)/i', $matches[1])) {
                return '<p>' . $matches[1] . '</p>';
            }
            return $matches[1];

        }
    }
}