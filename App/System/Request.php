<?php

namespace App\System;

class Request
{
    public array $request;

    public function __construct()
    {
        if (isset($_POST)) {
            $this->request = $_POST;
        }
    }

    public function get($variable)
    {
        if (array_key_exists($variable, $this->request)) {
            return $this->request[$variable];
        }

        return false;
    }
}