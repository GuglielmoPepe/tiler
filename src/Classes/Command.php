<?php 

namespace Tiler\Classes;

class Command implements \Tiler\Interfaces\Command
{
    private $data;
    private $handler;

    public function __construct(\ArrayAccess $data, \Tiler\Interfaces\Handler $handler)
    {
        $this->data = $data;
        $this->handler = $handler;
    }

    public function render(string $file) : string
    {
        ob_start();

        include $this->handler->handle($file);

        return ob_get_clean();
    }
}

