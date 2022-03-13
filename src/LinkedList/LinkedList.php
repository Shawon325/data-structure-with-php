<?php

namespace Shawon\Preparation\LinkedList;

class LinkedList
{
    public $head = null, $tail = null, $length = 0;

    public function insertAtFirst($value)
    {
        $node = new Node($value);
        $node->next = $this->head;
        $this->head = $node;
        $this->length += 1;

        return $this;
    }

    public function insert($value)
    {
        $node = new Node($value);

        if ($this->head == null) {
            $this->head = $node;
        } else {
            $this->tail->next = $node;
        }

        $this->tail = $node;
        $this->length += 1;

        return $this;
    }

    public function insertAtPosition($value, $position)
    {
        if ($position > $this->length + 1) {
            echo "This position not found!" . PHP_EOL;
        } elseif ($position < 1) {
            echo "Zero Or Negative value not allowed!" . PHP_EOL;
        } else {
            if ($position == 1) {
                $this->insertAtFirst($value);
            } elseif ($position == $this->length + 1) {
                $this->insert($value);
            } else {
                $node = new Node($value);
                $currentNode = $this->head;
                $currentPosition = 1;

                while ($currentPosition < $position - 1) {
                    $currentNode = $currentNode->next;
                    $currentPosition++;
                }

                $currentNext = $currentNode->next;
                $node->next = $currentNext;
                $currentNode->next = $node;
                $this->length += 1;
            }
        }

        return $this;
    }

    public function removeAtFirst()
    {
        $this->head = $this->head->next;

        if ($this->head == null) {
            $this->tail = null;
        }

        $this->length -= 1;

        return $this;
    }

    public function removeAtLast()
    {
        $currentHead = $this->head;

        while ($currentHead->next->next) {
            $currentHead = $currentHead->next;
        }

        $currentHead->next = null;
        $this->tail = $currentHead;
        $this->length -= 1;

        return $this;
    }

    public function removeAtPosition($position)
    {
        if ($position > $this->length) {
            echo "This position not found!" . PHP_EOL;
        } elseif ($position < 1) {
            echo "Zero Or Negative value not allowed!" . PHP_EOL;
        } else {
            if ($position == 1) {
                $this->removeAtFirst();
            } elseif ($position == $this->length) {
                $this->removeAtLast();
            } else {
                $currentNode = $this->head;
                $currentPosition = 1;

                while ($currentPosition < $position - 1) {
                    $currentNode = $currentNode->next;
                    $currentPosition++;
                }

                $currentNode->next = $currentNode->next->next;
                $this->length -= 1;
            }
        }

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
            $previous = $current;
            $current = $next;
        }

        $this->tail = $this->head;
        $this->head = $previous;

        return $this;
    }

    public function traverse()
    {
        $start = $this->head;

        while ($start) {
            echo $start->data . PHP_EOL;
            $start = $start->next;
        }
    }
}
