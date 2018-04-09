<?php
namespace ncb;

use Regex;

class Markdown
{
    private $defaultRegex;

    public function __construct()
    {
        $this->defaultRegex = array(
            new Regex('header', '/(#+)(.*)/g)', this::header)
        );
    }

}