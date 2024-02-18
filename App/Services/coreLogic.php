<?php

namespace App\Services;

//use App\System\Request;
use App\System\Request;
global $controller;
class coreLogic
{
    public $board = null;
    public Request $requestHandler;

    public function __construct()
    {
        $this->requestHandler = new Request();
    }

    //Цялостно ресетване на играта
    function reset(): void
    {
        unset($_SESSION['board']);
        unset($_SESSION['winner']);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    function exitGame()
    {
        session_destroy();
        $this->requestHandler->request = array();
        $_POST = null;
        header('Location: ./');
    }  // Dobavqme si w houm kontoleri metoda i posle go rendvame i ni prashta vseki put tam


    //Ресетване на дъската
    function setBoard(): void
    {
        $_SESSION['board'] = array_fill(0, 9, null);
    }

    function checkWinner(): void
    {
        // Проверяваме всички възмоцни комбинаций за победа
        $winningCombinations = array(
            [0, 1, 2], [3, 4, 5], [6, 7, 8], // По редове
            [0, 3, 6], [1, 4, 7], [2, 5, 8], // По колони
            [0, 4, 8], [2, 4, 6] // По диагонали
        );
        foreach ($winningCombinations as $combination) {
            $cell1 = $_SESSION['board'][$combination[0]];
            $cell2 = $_SESSION['board'][$combination[1]];
            $cell3 = $_SESSION['board'][$combination[2]]; // взимаме комбиндцийте за победа
            //проверяваме ги
            if ($cell1 !== null && $cell1 === $cell2 && $cell1 === $cell3) {
                //Сетваме победител
                $_SESSION['winner'] = $cell1 == 'X' ? (isset($_SESSION['player-x']) ? $_SESSION['player-x'] : 'Ти') : (isset($_SESSION['player-o']) ? $_SESSION['player-o'] : 'Бот');
                //$this->winner = $cell1 == 'X' ? 'Ти' : 'Бот';
                break;
            }
        }
    }

    public function render()
    {
        include '../App/Templates/game.php';
    }
}