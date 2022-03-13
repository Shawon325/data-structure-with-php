<?php

namespace Shawon\Preparation\DoubleLinkedList;

class Node
{
    public $data = null, $previous = null, $next = null;

    public function __construct($data)
    {
        $this->data = $data;
    }
}
