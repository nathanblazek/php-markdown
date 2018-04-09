<?php

require __DIR__ . '/vendor/autoload.php';
$regex = new ncb\Regex('testname','testregex','testreplacement');
echo $regex->name;