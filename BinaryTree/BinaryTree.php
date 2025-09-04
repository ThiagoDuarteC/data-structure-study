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

    public function preorderTraversal(): array{
        $result = [];
        $this->preorderTraversalRecursive($this->root, $result);
        return $result;
    }

    private function preorderTraversalRecursive($node, &$result){
        if ($node){
            $result []= $node->data;
            $this->preorderTraversalRecursive($node->left, $result);
            $this->preorderTraversalRecursive($node->right, $result);
        }
    }

    public function postorderTraversal(): array{
        $result = [];
        $this->postorderTraversalRecursive($this->root, $result);
        return $result;
    }

    private function postorderTraversalRecursive($node, &$result){
        if ($node){
            $this->postorderTraversalRecursive($node->left, $result);
            $this->postorderTraversalRecursive($node->right, $result);
            $result []= $node->data;
        }
    }

    public function inorderTraversal(): array{
        $result = [];
        $this->inorderTraversalRecursive($this->root, $result);
        return $result;
    }

    private function inorderTraversalRecursive($node, &$result){
        if ($node){
            $this->inorderTraversalRecursive($node->left, $result);
            $result []= $node->data;
            $this->inorderTraversalRecursive($node->right, $result);
        }
    }
}

$tree = new BinaryTree();
$valuesToInsert = [5, 3, 1, 10, 15, 7];

for ($i = 0; $i < count($valuesToInsert); $i++) {
    $tree->insert($valuesToInsert[$i]);
}

// var_dump($tree->search(7));
// var_dump($tree->search(14));
// var_dump($tree->search(10));
// var_dump($tree->search(18));

echo "Preorder Traversal:";
print_r($tree->preorderTraversal());
echo "Inorder Traversal:";
print_r($tree->inorderTraversal());
echo "Postorder Traversal:";
print_r($tree->postorderTraversal());
