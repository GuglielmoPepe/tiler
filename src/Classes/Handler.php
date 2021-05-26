<?php 

declare(strict_types = 1);

namespace Tiler\Classes;

class Handler implements \Tiler\Interfaces\Handler 
{
    private $basepath;
    private $successor;

    public function __construct(string $basepath) 
    {
        $this->basepath = rtrim($basepath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        $this->successor = NULL;
    }

    final public function connect(\Tiler\Interfaces\Handler $successor) : void 
    {
        if ($this->successor === NULL) 
        {
            $this->successor = $successor;
        } 
        else 
        {
            $this->successor->connect($successor);
        }

        return;
    }

    final public function handle(string $file) : string
    {
        $realpath = $this->basepath . $file;

        if (file_exists($realpath)) 
        {
            return $realpath;
        }

        if ($this->successor !== NULL) 
        {
            return $this->successor->handle($file);
        }

        throw new Exception\HandlerClassNotFound();
    }
}

