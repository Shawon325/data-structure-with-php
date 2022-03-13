<?php

namespace Shawon\Preparation\LinkedList;

class Node
{
    public $data = null, $next = null;

    public function __construct($data)
    {
        $this->data = $data;
    }
}
