<?php

require __DIR__ . '/vendor/autoload.php';
$textStart = '
# Test Page
This is a test to see if the plugin works as intended. 
-----------------------
Sure **PHPUnit** can do this, but why not test it, as if I\'m an *end user* as well?!
';
$markdown = new ncb\Markdown();
echo $textStart.'<hr/>';
echo $markdown->render($textStart);
