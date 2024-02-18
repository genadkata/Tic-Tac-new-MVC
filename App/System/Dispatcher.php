<?php

namespace App\System;

use App\Controllers\errorController;
use App\Controllers\mainController;
use App\Controllers\singleController;

class Dispatcher
{

    public function path()
    {
        global $controller;
        $gameMode = $_SESSION['gameMode'] ?? null;
        $request = new \App\System\Request();
        $controller = new mainController();
        if ($gameMode === 'singleGame' || $request->get('singlegame') === "1")
        {
            $_SESSION['singleGame'] = true;
            $_SESSION['gameMode'] = 'singleGame';
            $controller->loadService('singleGameLogic.php');

        }
        //$controller->requestHandler->get('multygame') == "1"
        elseif ($gameMode === 'multyGame' || $request->get('multygame') === "1"){
            $_SESSION['multyGame'] = true;
            $_SESSION['gameMode'] = 'multyGame';
            $controller->loadService('multyGameLogic.php');
        }
    }
}

