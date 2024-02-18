<?php

namespace App\Controllers;


class errorController
{
    public function __construct()
    {
        $this->render();
    }

    public function render()
    {
        include '../App/Templates/error.php';
    }
}