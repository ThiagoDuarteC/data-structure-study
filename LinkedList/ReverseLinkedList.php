<?php
include 'LinkedList.php';

function reverseLinkedList(LinkedList $head): LinkedList|null
{
    $newList = null;

    while ($head) {
        $nextNode = $head->next;
        $head->next = $newList;
        $newList = $head;
        $head = $nextNode;
    }

    return $newList;
}

$node3 = new LinkedList(3);
$node2 = new LinkedList(2, $node3);
$node1 = new LinkedList(1, $node2);

echo "Lista original: ";
LinkedList::printList($node1);

$reversed = reverseLinkedList($node1);

echo "Lista invertida: ";
LinkedList::printList($reversed);