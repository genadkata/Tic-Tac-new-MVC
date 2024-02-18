
<?php

global $controller;
ob_start();
session_start();

use App\System\Dispatcher;


require '../vendor/autoload.php';

$controller = new Dispatcher();
    if((isset($_POST['singlegame']) && $_POST['singlegame'] === '1') || (isset($_POST['multygame']) && $_POST['multygame'] === '1') || isset($_SESSION['gameMode']))
    {
        $controller->path();
    }else{
    ?>
            <head>
                <meta charset="UTF-8">
                <title>Морски шах</title>
                <link rel="stylesheet"  type="text/css" href="./assets/style.css"/>
                <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css"/>
            </head>
            
            <body>


            <form method="post" action="">
                <div class="welcome">
                    <h1>Start playing Tic Tac Toe!</h1>
                    <h2>Please fill in your names</h2>
            
                    <div class="player-name">
                        <input type="text" id="player-x" name="player-x" placeholder="First player (X)" required/>
                    </div>
            
                    <div class="player-name">
                        <input type="text" id="player-o" name="player-o" placeholder="Second player (O)"/>
                    </div>
                    <button class="btn btn-primary" type="submit" name="singlegame" value="1">Single player</button>
                    <button class="btn btn-warning" type="submit" name="multygame" value="1">Multy player</button>
                </div>
            </form>

            <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
            </body>
<?php
    }
?>