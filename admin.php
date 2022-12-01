    <!-- header des pages -->
    <?php
        include 'header.php';
        include 'connect.php';
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] === 'false' OR $user != 'admin'){
            header('Location: index.php');
        }
        if (!$_SESSION['loginOK']){
            header('Location: connexion.php');
        }
    ?>

    <!-- contenu de la page -->
    <main>
        <div class="container">
            <h1>Administration</h1>
            <div id="table_admin">
                <h2>Utilisateurs</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nom d'utilisateur</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $request = "SELECT * FROM utilisateurs";
                            $exec_request = $connect -> query($request);
                            while(($result = $exec_request -> fetch_assoc()) != null)
                            {
                                echo "<tr>";
                                echo "<td>".$result['login']."</td>";
                                echo "<td>".$result['prenom']."</td>";
                                echo "<td>".$result['nom']."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- footer des pages -->
    <?php
        include 'footer.php';
    ?>
</body>
</html>