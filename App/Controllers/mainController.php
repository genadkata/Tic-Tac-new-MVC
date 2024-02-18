<?php

namespace App\Controllers;

use App\Services\multyGameLogic;
use App\Services\singleGameLogic;

class mainController
{
    protected string $serviceDir = '../App/Services/';
    protected string $controllerDir = '../App/Controllers/';

    public function loadService($serviceFile)
    {
        if (file_exists($this->serviceDir.$serviceFile)) {
            require $this->serviceDir.$serviceFile;
            if ($_SESSION['gameMode'] == 'singleGame'){
                $x = new singleGameLogic();
            }else{
                $x = new multyGameLogic();
            }
        } else {
            $this->loadError();
        }
    }

    public function loadError(): void
    {
        require $this->controllerDir.'errorController.php';
        $error = new errorController();
    }

}