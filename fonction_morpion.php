<!-- Partie PHP -->
<?php
    if (!isset($_SESSION['tour'])){
        $_SESSION['tour'] = 1;
    }

    // Définition du joueur (X ou O) dans une variable session pour qu'il le garde en mémoire
    if (!isset($_SESSION['joueur'])){
        $_SESSION['joueur'] = 'X';
    }

    function jeu($case, $jeu){
        if ($_SESSION['tour'] % 2 != 0){
            $_SESSION[$case] = 'X';
            $_SESSION[$jeu] = "img/croix.png";
        }
        else {
            $_SESSION[$case] = 'O';
            $_SESSION[$jeu] = "img/rond.png";
        }
    }

    function chgmt_joueur(){
        if ($_SESSION['tour'] % 2 == 0){
            $_SESSION['joueur'] = 'O';
        }
        else {
            $_SESSION['joueur'] = 'X';
        }
    }

    function victoire(){
        //lignes
        if (isset($_SESSION['case1']) && isset($_SESSION['case2']) && isset($_SESSION['case3'])){
            if ($_SESSION['case1'] == $_SESSION['case2'] && $_SESSION['case2'] == $_SESSION['case3']){
                return 'gagné';
            }
        }
        if (isset($_SESSION['case4']) && isset($_SESSION['case5']) && isset($_SESSION['case6'])){
            if ($_SESSION['case4'] == $_SESSION['case5'] && $_SESSION['case5'] == $_SESSION['case6']){
                return 'gagné';
            }
        }
        if (isset($_SESSION['case7']) && isset($_SESSION['case8']) && isset($_SESSION['case9'])){
            if ($_SESSION['case7'] == $_SESSION['case8'] && $_SESSION['case8'] == $_SESSION['case9']){
                return 'gagné';
            }
        }
        //colonnes
        for ($i=1; $i < 4; $i++) { 
            if (isset($_SESSION['case' . $i]) && isset($_SESSION['case' . $i+3]) && isset($_SESSION['case' . $i+6])){
                if ($_SESSION['case' . $i] == $_SESSION['case' . $i+3] && $_SESSION['case' . $i+3] == $_SESSION['case' . $i+6]){
                    return 'gagné';
                }
            }
        }
        //diagonales
        if (isset($_SESSION['case1']) && isset($_SESSION['case5']) && isset($_SESSION['case9'])){
            if ($_SESSION['case1'] == $_SESSION['case5'] && $_SESSION['case5'] == $_SESSION['case9']){
                return 'gagné';
            }
        }
        if (isset($_SESSION['case3']) && isset($_SESSION['case5']) && isset($_SESSION['case7'])){
            if ($_SESSION['case3'] == $_SESSION['case5'] && $_SESSION['case5'] == $_SESSION['case7']){
                return 'gagné';
            }
        }
        //match nul
        $count = 0;
        for ($i=1; $i < 10; $i++) { 
            if (isset($_SESSION['case' . $i])){
                $count++;
            }
        }
        if ($count == 9){
            return 'match nul';
        }
        return 1;
    }
    // RESET //

    if (isset($_POST['reset'])){
        for ($i = 1; $i < 10; $i++){
            if (isset($_SESSION['case' . $i])){
                $_SESSION["case$i"] = null;
            }
            if (isset($_POST['case' . $i])){
                $_POST["case$i"] == null;
            }
        }
        $_SESSION['joueur'] = 'X';
        $_SESSION['tour'] = 0;
    }

?>