<?php

class LinkedList
{
    public $val = 0;
    public $next;
    public function __construct($val, $next = null)
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
