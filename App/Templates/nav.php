<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Tic Tac Toe</a>
        </div>

        <div class="container">

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="?exit=true">Начало</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left" style="background: darkslategray">
                    <li><a><?php echo isset($_SESSION['player-x']) ? $_SESSION['player-x'] . ' ❌' : 'Играч 1 ❌';?></a></li>
                    <li><a><?php echo isset($_SESSION['player-o']) ? $_SESSION['player-o'] . ' <font style="filter: hue-rotate(180deg)">⭕</font>' : 'Играч 2 (Робот) <font style="filter: hue-rotate(180deg)">⭕</font>'; ?></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="?reset=true">Рестартирай игра</a></li>
                    <li><a href="?exit=true">Изход</a></li>
                </ul>
            </div>
        </div>
</nav>