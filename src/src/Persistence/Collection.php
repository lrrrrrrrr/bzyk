<?php

namespace Application\Persistence;

class Collection implements \Iterator
{
    protected int $position = 0;
    protected array $collection = [];

    public function add($entity)
    {
        $this->collection[] = $entity;
    }

    public function current():mixed
    {
        return $this->collection[$this->position];
    }

    public function next():void
    {
        ++$this->position;
    }

    public function key():int
    {
        return $this->position;
    }

    public function valid():bool
    {
        return isset($this->collection[$this->position]);
    }

    public function rewind():void
    {
        $this->position = 0;
    }

    public function count():int
    {
        return count($this->collection);
    }

    public function get($key):mixed
    {
        return $this->collection[$key];
    }
}