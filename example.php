<?php

require __DIR__ . '/vendor/autoload.php';
$textStart = "
# Test Page
This is a test to see if the plugin works as intended. 
Sure **PHPUnit** can do this, but why not test it, as if I'm an *end user* as well?!

## Lists!

### Unordered
*List Item 1
*List Item 2
*List Item 3

### Ordered
34.Test Item 1
33.Test Item 2
3333.Test Item 3
-----------
Do links work? Let's try it...[Woohoo](http://www.nateblazek.com)

>Blockquotes work too, but seriously, are these really used anymore?

";
echo ncb\Markdown::render($textStart);
