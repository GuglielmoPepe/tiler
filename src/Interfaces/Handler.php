<?php 

declare(strict_types = 1);

namespace Tiler\Interfaces;

interface Handler
{
    public function connect(Handler $handler) : void;
    public function handle(string $path) : string;
}

