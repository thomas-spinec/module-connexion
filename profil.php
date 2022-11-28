<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    
    <!-- header des pages -->
    <?php
        include 'header.php';
        include 'connect.php';
    ?>

    <!-- contenu de la page -->
    <main>
        <h1>Profil</h1>
        <?php
            echo "<p>Bonjour $user</p>";
            echo "<p>Voici vos informations:</p>";

            // rappel des variable contenant les informations de l'utilisateur
            $login = $_SESSION['login'];
            $password = $_SESSION['password'];
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];

        ?>

        <?php
            // affichage en cas d'erreur
            if(isset($_GET['erreur'])){
                if ($_GET['erreur'] == 1){
                    echo "<p style='color:red'>Mot de passe incorrect, modifications non réalisées</p>";
                }
                else if ($_GET['erreur'] == 2){
                    echo "<p style='color:red'>Veuillez entrer votre mot de passe pour réaliser des changements</p>";
                }
            }
        ?>
        <form action="" method="post">
            <label for="login">login</label>
            <input type="text" name="login" id="login" value="<?=$login?>">
            <label for ="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" value="<?=$prenom?>">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?=$nom?>">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe">
            <input type="submit" value="Modifier">
        </form>

        <?php
            if(isset($_POST['Modifier'])){
                if (isset($_POST['password']) && $_POST['password'] !== ''){
                    if (password_verify($password, $_POST['password'])) { //mot de passe correct
                        $login = $_POST['login'];
                        $prenom = $_POST['prenom'];
                        $nom = $_POST['nom'];
                        // stockage des nouvelles infos dans la BDD
                        // $password = password_hash($password, PASSWORD_BCRYPT);
                        $requete = "UPDATE utilisateurs SET login = '".$login."', prenom = '".$prenom."', nom = '".$nom."'";
                        $exec_requete = $connect -> query($requete);
                        // stockage des nouvelles infos dans les variables de session
                        $_SESSION['login'] = $login;
                        $_SESSION['prenom'] = $prenom;
                        $_SESSION['nom'] = $nom;
                        echo "<p style='color:green'>Modifications réalisées</p>";
                        // redirection vers la page profil avec les nouvelles données
                        header('Location: profil.php');
                    }
                    else{
                        header('Location: profil.php?erreur=1'); // mot de passe incorrect
                    }
                }
                else{
                    header('Location: profil.php?erreur=2'); // mot de passe vide
                }
            }
        ?>
        <br>
        <br>
        <?php
            //affichage en cas d'erreur
            if(isset($_GET['erreur'])){
                if ($_GET['erreur'] == 3){
                    echo "<p style='color:red'>Les deux mots de passe ne correspondent pas</p>";
                }
                else if ($_GET['erreur'] == 4){
                    echo "<p style='color:red'>Veuillez entrer un nouveau mot de passe</p>";
                }
                else if ($_GET['erreur'] == 5){
                    echo "<p style='color:red'>Case ancien mot de passe vide ou incorrect</p>";
                }
            }

        ?>
        <br>
        <form action="" method="post">
            <label for="password1">Ancien mot de passe</label>
            <input type="password" name="password1" id="password" placeholder="Entrez votre ancien mot de passe">
            <label for="newpassword">Nouveau mot de passe</label>
            <input type="password" name="newpassword" id="newpassword" placeholder="Entrez votre nouveau mot de passe">
            <label for="newpassword2">Confirmez votre nouveau mot de passe</label>
            <input type="password" name="newpassword2" id="newpassword2" placeholder="Confirmez votre nouveau mot de passe">
            <input type="submit" value="Changer le mot de passe">
        </form>

        <?php
            if(isset($_POST['Changer le mot de passe'])){
                if (isset($_POST['password1'])){
                    if (password_verify($password, $_POST['password1'])) { // ancien mot de passe correct
                        if (isset($_POST['newpassword']) && $_POST['newpassword'] !== '' && isset($_POST['newpassword2']) && $_POST['newpassword2'] !== ''){
                            if ($_POST['newpassword'] == $_POST['newpassword2']){ // nouveau mot de passe correct
                                $password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
                                // stockage du nouveau mot de passe dans la BDD
                                $requete = "UPDATE utilisateurs SET password = '".$password."'";
                                $exec_requete = $connect -> query($requete);
                                // stockage du nouveau mot de passe dans les variables de session
                                $_SESSION['password'] = $password;
                                echo "<p style='color:green'>Mot de passe modifié</p>";
                                // redirection vers la page profil avec le nouveau mot de passe
                                header('Location: profil.php');
                            }
                            else{
                                header('Location: profil.php?erreur=3'); // deux mots de passe différents
                            }
                        }
                        else{
                            header('Location: profil.php?erreur=4'); // nouveau mot de passe vide
                        }
                    }
                    else{
                        header('Location: profil.php?erreur=5'); // ancien mot de passe incorrect
                    }
                }
                else{
                    header('Location: profil.php?erreur=5'); // ancien mot de passe vide
                }
            }

        ?>

    </main>

    <!-- footer des pages -->
    <?php
        include 'footer.php';
    ?>
</body>
</html>