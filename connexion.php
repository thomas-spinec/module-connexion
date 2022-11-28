<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <!-- header des pages -->
    <?php
        include 'header.php';
    ?>

    <!-- contenu de la page -->
    <main>
        <h1>Connexion</h1>
        <form action="verif.php" method="post">
            <label for="login">login</label>
            <input type="text" name="login" id="login" placeholder="login" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Mot de passe" required>
            <input type="submit" value="Se connecter">
        </form>

        <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            }
        ?>
    </main>

    <!-- footer des pages -->
    <?php
        include 'footer.php';
    ?>
</body>
</html>