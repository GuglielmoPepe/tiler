<?php 

namespace Tiler\Interfaces;

interface Command
{
    public function render(string $file) : string;
}

