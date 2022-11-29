    <!-- header des pages -->
    <?php
        include 'header.php';
        include 'connect.php';
    ?>

    <!-- contenu de la page -->
    <main>
        <h1>Administration</h1>
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
    </main>
</body>
</html>