<?php

namespace Shawon\Preparation\DoubleLinkedList;

class DoubleLinkedList
{
    public $head = null, $tail = null, $length = 0;

    public function insert($value)
    {
        $node = new Node($value);

        if ($this->head == null) {
            $this->head = $node;
        } else {
            $node->previous = $this->tail;
            $this->tail->next = $node;
        }

        $this->tail = $node;
        $this->length += 1;

        return $this;
    }

    public function removeAtLast()
    {
        $currentNode = $this->head;

        while ($currentNode->next->next) {
            $currentNode = $currentNode->next;
        }

        $currentNode->next = null;
        $this->tail = $currentNode;
        $this->length -= 1;

        return $this;
    }

    public function reverse()
    {
        $current = $this->head;
        $previous = null;
        $next = null;

        while ($current) {
            $next = $current->next;
            $current->next = $previous;
            $current->previous = $current->next;
            $previous = $current;
            $current = $next;
        }

        print_r($previous);
    }

    public function traverse()
    {
        $currentNode = $this->head;

        while ($currentNode) {
            echo $currentNode->data . PHP_EOL;
            $currentNode = $currentNode->next;
        }
    }
}
