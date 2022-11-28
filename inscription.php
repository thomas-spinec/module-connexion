<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <!-- header des pages -->
    <?php
        include 'header.php';
    ?>

    <!-- contenu de la page -->
    <main>
        <h1>Inscription</h1>
        <form action="inscription.php" method="post">
            <label for="login">login</label>
            <input type="text" name="login" id="login" placeholder="login" required>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Mot de passe" required>
            <label for="password2">Confirmation du mot de passe</label>
            <input type="password" name="password2" id="password2" placeholder="Confirmation du mot de passe" required>
            <input type="submit" value="S'inscrire">
        </form>
    </main>

    <!-- footer des pages -->
    <?php
        include 'footer.php';
    ?>

</body>
</html>