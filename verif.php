<?php
    session_start();

    if (isset($_POST['login']) && isset($_POST['password'])) {
        // Connexion à la base de données
        include 'connect.php';

        // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
        // pour éliminer toute attaque de type injection SQL et XSS
        $login = mysqli_real_escape_string($connect,htmlspecialchars($_POST['login'])); 
        $password = mysqli_real_escape_string($connect,htmlspecialchars($_POST['password']));

        if($login !== "" && $password !== ""){
            $requete = "SELECT count(*) FROM utilisateurs where 
                    login = '".$login."'";// and password = '".$password."' ";
            $exec_requete = $connect -> query($requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];

            if($count!=0){ // nom d'utilisateur correct
                $requete = "SELECT password FROM utilisateurs where login = '".$login."'";
                $exec_requete = $connect -> query($requete);
                $reponse      = mysqli_fetch_array($exec_requete);
                $password_hash = $reponse['password'];
                if (password_verify($password, $password_hash)) { //mot de passe correct
                    $_SESSION['login'] = $login;
                    header('Location: index.php');
                }
                else{
                    header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
                }
            }
            else{
                header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
            }
        }
        else{
            header('Location: connexion.php?erreur=2'); // utilisateur ou mot de passe vide
        }
    }
    else{
        header('Location: connexion.php');
    }
    mysqli_close($connect); // fermer la connexion