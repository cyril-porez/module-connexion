<?php
    session_start();
     $connex = mysqli_connect("localhost", "root", "", "cyril-porez_moduleconnexion");
     mysqli_set_charset($connex, 'utf8');
     $error = "";
    
    if (isset($_POST["submit"])) {
        if (!empty($_POST["login"]) && !empty($_POST["password"])) {            
            $login = $_POST["login"];
            $password = $_POST["password"];
            $verifLogin = mysqli_query($connex, "SELECT login, password FROM utilisateurs WHERE `login` = '$login'");
            $result = mysqli_fetch_all($verifLogin, MYSQLI_ASSOC);            
            if (count($result) == 1 ) {
                if (password_verify($password, $result[0]["password"])) {
                    $_SESSION["users"] = $login;
                    header("Location: index.php");
                }
                else
                    $error = "* problem password";
            }
            else
                $error = "* problem login";
        }
        else 
            $error = "* error dans le mot de passe ou le login";
    }   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
    <header>
        <nav id="navbar">
            <h1 id="porezuino">POREZUINO</h1>
            <ul id="menu">
                <?php
                    if (empty($_SESSION)) {
                        echo "<li><a href='index.php' class='navig'>Accueil</a></li>
                        <li><a href='inscription.php' class='navig'>Inscription</a></li>";                        
                    }
                    else {
                        echo "
                            <li><a href='index.php' class='navig'>Accueil</a><li>
                            <li><a href='profil.php' class='navig'>Profil</a><li>  
                            <li><a href='index.php' class='navig'>Déconnexion</a><li>";
                            
                    }
                ?>
            </ul>
        </nav>
    </header>
    <main id="mainConnexion">
        <div id="formuConnexion">
            <form action="connexion.php" method="post" id="formConnexion">
                <input type="text" name="login" id="login" class="champsConnex" placeholder="login">
                <input type="text" name="password" id="password" class="champsConnex" placeholder="mot de passe">
                <input type="submit" name="submit" id="boutonConnex" value="connexion">
                <?php
                    echo "<p id='msgError'>$error</p>";
                ?>
            </form>
        </div>
    </main>
    <footer id="foot">
        <div >
            <a  id="lien" href="https://github.com/cyril-porez/module-connexion">GITHUB</a>
        </div>
    </footer>
</body>
</html>