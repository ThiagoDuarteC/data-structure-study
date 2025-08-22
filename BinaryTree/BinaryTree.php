<?php

class TreeNode
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
    public function insert($data): void
    {
        if ($this->root == null) {
            $this->root = new TreeNode($data);
        } else {
            $this->insertRecursive($data, $this->root);
        }
    }

    private function insertRecursive($data, TreeNode $node): void{
        if ($data < $node->data) {
            if ($node->left) {
                $this->insertRecursive($data, $node->left);
            } else {
                $node->left = new TreeNode($data);
            }
        } else {
            if ($node->right) {
                $this->insertRecursive($data, $node->right);
            } else {
                $node->right = new TreeNode($data);
            }
        }
    }

    public function search($data): bool{
        return $this->searchRecursive($this->root, $data);
    }

    private function searchRecursive($node, $data): bool{
        if ($node == null){
            return false;
        }

        if($node->data == $data){
            return true;
        }

        if ($node->data < $data) {
            return $this->searchRecursive($node->right, $data);
        }

        return $this->searchRecursive($node->left, $data);
    }
}

$tree = new BinaryTree();
$valuesToInsert = [10, 5, 15, 3, 7, 12, 18];

for ($i = 0; $i < count($valuesToInsert); $i++) {
    $tree->insert($valuesToInsert[$i]);
}

var_dump($tree->search(7));
var_dump($tree->search(14));
var_dump($tree->search(10));
var_dump($tree->search(18));
