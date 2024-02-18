<?php

namespace App\Services;

class multyGameLogic extends coreLogic
{

    public function __construct()
    {
        parent::__construct();
        if ($this->requestHandler->get('player-x')){
            $_SESSION['player-x'] = $this->requestHandler->get('player-x');
        }
        if ($this->requestHandler->get('player-o')){
            $_SESSION['player-o'] = $this->requestHandler->get('player-o');
        }

        if (!isset($_SESSION['board'])) {
            $this->setBoard();
        }

        // Ресетваме играта
        if ($this->requestHandler->get('action') === 'reset') {
            $this->reset();
        }

        if ($this->requestHandler->get('exitGame') == 'exit') {
            $this->exitGame();
        }

        //Разбираме, че в URL-a има параметър 'reset' и рестартираме играта
        if (isset($_GET['reset']) && $_GET['reset']) {
            $this->reset();
        }

        //Разбираме, че в URL-a има параметър 'reset' и рестартираме играта
        if (isset($_GET['exit']) && $_GET['exit']) {
            $this->exitGame();
        }

        //Сетваме хода
        if (isset($_GET['move'])) {
            $this->makeMove($_GET['move']);
        }

        //Показваме шаблона
        $this->render();
    }

    //Функция за сетване на хода
    public function makeMove($index)
    {
        $_SESSION['board'][$index] = 'X'; // Нашия ход
        $this->playerMove($index);
        $this->checkWinner();
    }

    //Функция за сетване на хода на бота
    function playerMove($move): bool
    {
        if (isset($_SESSION['lastSymbol'])) {
            if ($_SESSION['lastSymbol'] == "X") {
               $_SESSION['board'][$move] = 'O'; // Нашия ход
            } else {
                $_SESSION['board'][$move] = 'X'; // Нашия ход
            }
            $_SESSION['lastSymbol'] = !$_SESSION['lastSymbol'];
            return true;
        } else {
            $_SESSION['lastSymbol'] = true;
            $this->playerMove($move);
        }

        return true;
    }
}