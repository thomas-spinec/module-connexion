<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
</head>
<body>
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