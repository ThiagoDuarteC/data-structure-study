<?php

class LinkedList
{
    public $val = 0;
    public $next = null;
    public function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }

    public static function printList($head)
    {
        $elements = [];
        while ($head) {
            $elements[] = $head->val;
            $head = $head->next;
        }
        echo implode(" -> ", $elements) . PHP_EOL;
    }
}
