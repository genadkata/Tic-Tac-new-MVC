<?php

namespace App\Services;
class singleGameLogic extends coreLogic
{
    public function __construct()
    {
        parent::__construct();
        if ($this->requestHandler->get('player-x')) {
            $_SESSION['player-x'] = $this->requestHandler->get('player-x');
        }

        if (!isset($_SESSION['board'])) {
            $this->setBoard();
        }

        // Правим си проветка и сетваме хода
        // Ресетваме играта
        if ($this->requestHandler->get('action') === 'reset') {
            $this->reset();
        }

        if ($this->requestHandler->get('exitGame') == 'exit') {
            $this->exitGame();
        }

        //Взимаме index-a на клетката от URL и задействаме хода
        if (isset($_GET['move'])) {
            $this->makeMove($_GET['move']);
        }

        //Разбираме, че в URL-a има параметър 'reset' и рестартираме играта
        if (isset($_GET['reset']) && $_GET['reset']) {
            $this->reset();
        }

        //Разбираме, че в URL-a има параметър 'reset' и рестартираме играта
        if (isset($_GET['exit']) && $_GET['exit']) {
            $this->exitGame();
        }

        //Показваме шаблона на страницата
        $this->render();

    }

    //фунцкия за сетване на хода на бота
    public function makeMove($index): void
    {
         $_SESSION['board'][$index] = 'X'; // Нашия ход
         $this->makeBotMove(); // функция за хода на бота
         $this->checkWinner();
    }

    //Действие на хода на бота
    public function makeBotMove(): void
    {
        $emptyCells = array_filter($_SESSION['board'], function ($cell)  // Взимаме си празните клетки
        {
            return $cell === null;
        });
        if (!empty($emptyCells)) { // Проверяваме дали са празни
            $randomCell = array_rand($emptyCells); // Избира рандом клетка
            $_SESSION['board'][$randomCell] = "O"; // Сетваме хода на бота
        }
    }

}