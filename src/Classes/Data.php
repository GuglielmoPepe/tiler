<?php 

declare(strict_types = 1);

namespace Tiler\Classes;

class Data implements \ArrayAccess
{
    private $records;

    public function __construct(array $records = [])
    {
        $this->records = $records;
    }

    public function offsetExists($offset)
    {
        return isset($this->records[$offset]) ? TRUE : FALSE;
    }

    public function offsetGet($offset)
    {
        if ( ! isset($this->records[$offset]))
        {
            throw new \Exception('The record ' . $offset . '  doesn\'t exists!');
        }

        return $this->records[$offset];
    }

    public function offsetSet($offset, $value)
    {
        throw new Exception\MethodCallNotAllowed();
    }

    public function offsetUnset($offset)
    {
        throw new Exception\MethodCallNotAllowed();
    }
}

