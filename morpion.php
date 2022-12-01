    <h2 id="title_morpion">morpion</h2>
    <?php  // JEU //
        if (isset($_POST['case1'])){
            $case1 = 'case1';
            $jeu1 = 'jeu1';
            jeu($case1, $jeu1);
        }
        if (isset($_POST['case2'])){
            $case2 = 'case2';
            $jeu2 = 'jeu2';
            jeu($case2, $jeu2);
        }
        if (isset($_POST['case3'])){
            $case3 = 'case3';
            $jeu3 = 'jeu3';
            jeu($case3, $jeu3);
        }
        if (isset($_POST['case4'])){
            $case4 = 'case4';
            $jeu4 = 'jeu4';
            jeu($case4, $jeu4);
        }
        if (isset($_POST['case5'])){
            $case5 = 'case5';
            $jeu5 = 'jeu5';
            jeu($case5, $jeu5);
        }
        if (isset($_POST['case6'])){
            $case6 = 'case6';
            $jeu6 = 'jeu6';
            jeu($case6, $jeu6);
        }
        if (isset($_POST['case7'])){
            $case7 = 'case7';
            $jeu7 = 'jeu7';
            jeu($case7, $jeu7);
        }
        if (isset($_POST['case8'])){
            $case8 = 'case8';
            $jeu8 = 'jeu8';
            jeu($case8, $jeu8);
        }
        if (isset($_POST['case9'])){
            $case9 = 'case9';
            $jeu9 = 'jeu9';
            jeu($case9, $jeu9);
        }
        // FIN JEU //
    ?>
    <br>
    <br>
    <!-- Tableau -->
    <table id="table_morpion">
        <tr> <!-- 1ère ligne -->
            <td>
                    <?php
                        if (isset($_SESSION['case1'])){
                            echo "<img src=".$_SESSION['jeu1']." alt=''/>";
                            victoire();
                        }
                        else {
                            echo "<form action='' method='post'>
                            <input type='submit' value='-' name='case1'>
                            </form>";
                        }
                    ?>
            </td>
            <td>
                    <?php
                        if (isset($_SESSION['case2'])){
                            echo "<img src=".$_SESSION['jeu2']." alt=''/>";
                            victoire();
                        }
                        else {
                            echo "<form action='' method='post'>
                            <input type='submit' value='-' name='case2'>
                            </form>";
                        }
                    ?>
            </td>
            <td>
                    <?php
                        if (isset($_SESSION['case3'])){
                            echo "<img src=".$_SESSION['jeu3']." alt=''/>";
                            victoire();
                        }
                        else {
                            echo "<form action='' method='post'>
                            <input type='submit' value='-' name='case3'>
                            </form>";
                        }
                    ?>
            </td>
        </tr>
        <tr> <!-- 2ème ligne -->
            <td>
                    <?php
                        if (isset($_SESSION['case4'])){
                            echo "<img src=".$_SESSION['jeu4']." alt=''/>";
                            victoire();
                        }
                        else {
                            echo "<form action='' method='post'>
                            <input type='submit' value='-' name='case4'>
                            </form>";
                        }
                    ?>
            </td>
            <td>
                    <?php
                        if (isset($_SESSION['case5'])){
                            echo "<img src=".$_SESSION['jeu5']." alt=''/>";
                            victoire();
                        }
                        else {
                            echo "<form action='' method='post'>
                            <input type='submit' value='-' name='case5'>
                            </form>";
                        }
                    ?>
            </td>
            <td>
                    <?php
                        if (isset($_SESSION['case6'])){
                            echo "<img src=".$_SESSION['jeu6']." alt=''/>";
                            victoire();
                        }
                        else {
                            echo "<form action='' method='post'>
                            <input type='submit' value='-' name='case6'>
                            </form>";
                        }
                    ?>
            </td>
        </tr>
        <tr> <!-- 3ème ligne -->
            <td>
                    <?php
                        if (isset($_SESSION['case7'])){
                            echo "<img src=".$_SESSION['jeu7']." alt=''/>";
                            victoire();
                        }
                        else {
                            echo "<form action='' method='post'>
                            <input type='submit' value='-' name='case7'>
                            </form>";
                        }
                    ?>
            </td>
            <td>
                    <?php
                        if (isset($_SESSION['case8'])){
                            echo "<img src=".$_SESSION['jeu8']." alt=''/>";
                            victoire();
                        }
                        else {
                            echo "<form action='' method='post'>
                            <input type='submit' value='-' name='case8'>
                            </form>";
                        }
                    ?>
            </td>
            <td>
                    <?php
                        if (isset($_SESSION['case9'])){
                            echo "<img src=".$_SESSION['jeu9']." alt=''/>";
                            victoire();
                        }
                        else {
                            echo "<form action='' method='post'>
                            <input type='submit' value='-' name='case9'>
                            </form>";
                        }
                    ?>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <form action="" method="post">
        <input type="submit" value="reset" name="reset">
    </form>
    <br>
    <br>
    <?php // Verification victoire //
        if (victoire() == 'gagné'){
            echo "<p class='morpion'>Victoire du joueur ". $_SESSION['joueur']."</p>";
        }
        else if (victoire() == 'match nul'){
            echo "<p class='morpion'>Match nul!</p>";
        }
        else{
            chgmt_joueur();
            echo "<p class='morpion'>Au tour du joueur ". $_SESSION['joueur']."</p>";
            echo "<p class='morpion'>tour :  ". $_SESSION['tour']."</p>";
        }
    ?>