<?php
namespace ncb;


class Regex {
    public $name;
    public $regex;
    public $replacement;
    public $example;
    public $result;
    /**
     * Regex constructor.
     * @param $name
     * @param $regex
     * @param $replacement
     * @param $example
     * @param $result
     */
    public function __construct($name = null,$regex = null,$replacement = null, $example = null, $result = null){
        $this->name         = $name;
        $this->regex        = $regex;
        $this->replacement  = $replacement;
        $this->example      = $example;
        $this->result       = $result;
    }

}