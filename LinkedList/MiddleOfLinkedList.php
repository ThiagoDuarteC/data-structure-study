<?php
include 'LinkedList.php';

function middleNode(LinkedList $head)
{
    $fast = $head;
    $slow = $head;

    while ($fast && $fast->next) {
        $slow = $slow->next;
        $fast = $fast->next?->next;
    }

    return $slow;
}

$node5 = new LinkedList(5);
$node4 = new LinkedList(4, $node5);
$node3 = new LinkedList(3, $node4);
$node2 = new LinkedList(2, $node3);
$node1 = new LinkedList(1, $node2);

echo "Lista original: ";
LinkedList::printList($node1);

$reversed = middleNode($node1);

echo "Lista no meio: ";
LinkedList::printList($reversed);