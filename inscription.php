    <!-- header des pages -->
    <?php
        include 'header.php';
        include 'connect.php';
    ?>

    <!-- contenu de la page -->
    <main>
        <h1>Inscription</h1>
        <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1){
                    echo "<p style='color:red'>Utilisateur déjà créé</p>";
                }
                if($err==2){
                    echo "<p style='color:red'>Mot de passe différent</p>";
                }
                if($err==3){
                    echo "<p style='color:red'>Veuillez remplir tous les champs</p>";
                }
            }
        ?>

        <form action="inscription.php" method="post">
            <label for="login">login</label>
            <input type="text" name="login" id="login" placeholder="login" required>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="Nom" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Mot de passe" required>
            <label for="password2">Confirmation du mot de passe</label>
            <input type="password" name="password2" id="password2" placeholder="Confirmation du mot de passe" required>
            <input type="submit" value="S'inscrire">
        </form>

        <?php
            if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['prenom']) && isset($_POST['nom'])){
                $login = mysqli_real_escape_string($connect,htmlspecialchars($_POST['login']));
                $password = mysqli_real_escape_string($connect,htmlspecialchars($_POST['password']));
                $password2 = mysqli_real_escape_string($connect,htmlspecialchars($_POST['password2']));
                $prenom = mysqli_real_escape_string($connect,htmlspecialchars($_POST['prenom']));
                $nom = mysqli_real_escape_string($connect,htmlspecialchars($_POST['nom']));

                if($login !== "" && $password !== "" && $password2 !== "" && $prenom !== "" && $nom !== ""){
                    if($password == $password2){
                        $requete = "SELECT count(*) FROM utilisateurs where login = '".$login."'";
                        $exec_requete = $connect -> query($requete);
                        $reponse      = mysqli_fetch_array($exec_requete);
                        $count = $reponse['count(*)'];

                        if($count==0){
                            $password = password_hash($password, PASSWORD_DEFAULT);
                            $requete = "INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ('".$login."', '".$prenom."', '".$nom."', '".$password."')";
                            $exec_requete = $connect -> query($requete);
                            header('Location: connexion.php');
                        }
                        else{
                            header('Location: inscription.php?erreur=1'); // utilisateur déjà existant
                        }
                    }
                    else{
                        header('Location: inscription.php?erreur=2'); // mot de passe différent
                    }
                }
                else{
                    header('Location: inscription.php?erreur=3'); // utilisateur ou mot de passe vide
                }
            }

            mysqli_close($connect); // fermer la connexion
        ?>

    </main>



    <!-- footer des pages -->
    <?php
        include 'footer.php';
    ?>

</body>
</html>