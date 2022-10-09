<?php

namespace MVC\Core;

class Request
{
    public function path(): string
    {
        $path       = htmlspecialchars( $_SERVER['REQUEST_URI'], ENT_QUOTES) ?? DS;
        $position   = strpos($path, '?');
        return !$position ? $path : substr($path, 0, $position);
    }

    public function method(): string
    {
        return strtolower(filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING));
    }
}