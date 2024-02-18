<html lang="en" id="page">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Морски шах</title>
    <link rel="stylesheet" type="text/css" href="./assets/style.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/toastr.css"/>
</head>
<body>

<?php

include '../App/Templates/nav.php';

?>

<center/>

<?php
//Проверяваме за победител
if (isset($_SESSION['winner'])) {
// Сетваме 1 от побеетидели
    echo '<p id="winner" style="visibility: hidden;">' . $_SESSION['winner'] . ' победи!</p>';
// Проверка за равенство -->
} else if (!in_array(null, $_SESSION['board'], true)) {
//Равенство -->
    echo '<p style="width: 600px; padding: 30px; background: orange; color: white; font-size: 20px; border: 1px solid lightgray;">Няма победител :( !</p>';
}
?>
<form method="post">
    <div class="container">
        <div class="square-table">
            <?php
            for ($i = 0; $i < 3; $i++) {
                for ($j = 0; $j < 3; $j++) {
                    $index = 3 * $i + $j; // вземаме си индекса
                    // Използваме двата цикъла за да обходим всяка една клетка от борда ни на принципа (0.0 , 0.1 , 0.2 ; 1.0 , 1.1 и т.н.)
                    $value = $_SESSION['board'][$index];
                    // Ако е празен индекс
                    echo '<div class="square-cell">';
                    if ($value === null) {
                        // бутонче със име move за следващ ход  със сетнат индекс -->
                        if (!isset($_SESSION['winner'])) {
                            echo '<div><a class="move" href="?move=' . $index . '"> </a></div>';
                        } else {
                            echo '<div></div>';
                        }
                    } else {
                        // След натискане на бутона да се показва нашия или символа на робота  -->
                        echo $value == 'X' ? "<div>❌</div>" : "<div style='filter: hue-rotate(180deg)'>⭕</div>";
                    }
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</form>
<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/toastr.js"></script>
<script>
    $(document).ready(function () {
        //Показваме нотификация за победител
        const showNotification = function () {

            toastr.options = {
                //"closeButton": true,
                "debug": true,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000000",
                "timeOut": "0",
                //"extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"]("ЧЕСТИТО", $("#winner")[0].innerHTML);
        };

        if ($("#winner")[0].innerHTML != undefined) {
            showNotification() //Извикваме config-a за toastr-a + изпълнението му
        }
    });
</script>
</body>
</html>