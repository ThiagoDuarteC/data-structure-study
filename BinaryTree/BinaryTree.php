<?php

class Node
{
    public $data;
    public $left;
    public $right;
    public function __construct($data)
    {
        $this->data = $data;
    }
}

class BinaryTree
{
    public $root;
    public function insert($data)
    {
        if ($this->root == null) {
            $this->root = new Node($data);
        } else {
            $this->insertRecursive();
        }
    }

    private function insertRecursive($data, Node $node){
        if ($data < $node->data) {
            if ($node->left) {
                $this->insertRecursive($data, $node->left);
            } else {
                $node->left = new Node($data);
            }
        }
    }
}