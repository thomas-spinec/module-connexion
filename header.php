<!-- header des pages -->

<header>
    <div>
        <h3>Thomas Spinec</h3>
        <h4>Web Developper</h4>
    </div>
    <?php
        // test si l'utilisateur est connecté
    
        session_start();
        if (isset($_GET['deconnexion'])){
            if($_GET['deconnexion']==true){
                session_unset();
                header('Location: index.php');
            }
        }
        else if(isset($_SESSION['login'])){
            $user = $_SESSION['login'];

            echo "<div>
                    <p>Bonjour $user</p>
                    <a href='index.php?deconnexion=true'><span>Déconnexion</span></a>
                </div>";
            
            if ($user == 'admin') {
                echo "<nav>
                    <ul>
                        <li><a href='index.php'>Accueil</a></li>
                        <li><a href='profil.php'>Profil</a></li>
                        <li><a href='admin.php'>Info Utilisateurs</a></li>
                    </ul>
                </nav>";
            }
            else {
                echo "<nav>
                    <ul>
                        <li><a href='index.php'>Accueil</a></li>
                        <li><a href='profil.php'>Profil</a></li>
                    </ul>
                </nav>";
            }
        }
        else{
            echo "<nav>
                    <ul>
                        <li><a href='index.php'>Accueil</a></li>
                        <li><a href='connexion.php'>Connexion</a></li>
                        <li><a href='inscription.php'>Inscription</a></li>
                    </ul>
                </nav>";
        }
    ?>
</header>
