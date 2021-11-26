<?php
    $connex = mysqli_connect("localhost", "root", "", "cyril-porez_moduleconnexion");
    mysqli_set_charset($connex, 'utf8');
    $error = "";
    if (isset($_POST["submit"])) {     
        if (!empty($_POST["login"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["password"])) {
            $login = $_POST["login"];
            $prenom = $_POST["prenom"];
            $nom = $_POST["nom"];
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirmPassword"];
            $verifLogin = mysqli_query($connex, "SELECT login FROM utilisateurs WHERE login = '$login'");
            $result = mysqli_fetch_all($verifLogin);
            if (count($result) == 0) {
                if ($password == $confirmPassword){
                    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    $requete = mysqli_query($connex, "INSERT into utilisateurs (login, prenom, nom, password) VALUES ('$login', '$prenom', '$nom', '$password')");
                    header("Location: connexion.php");
                }
                else
                    $error = "* error confirmation mot de passe";
            }
            else {
               $error = "Ce login existe déjà";
            }
        }
        else 
            $error = "error";
    }
    else if (isset($_POST["login"]) || isset($_POST["prenom"]) || isset($_POST["nom"]) && isset($_POST["password"])) {
        $error ="problem";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    
</head>
<body>
    <header>
    <nav id="navbar">
            <h1 id="porezuino">POREZUINO</h1>
            <ul id="menu">
                <?php
                    if (empty($_SESSION)) {
                        echo "<li><a href='index.php' class='navig'>Accueil</a></li>
                              <li><a href='connexion.php' class='navig'>Connexion</a></li>";
                    }
                    else {
                        echo "<li><a href='index.php' class='navig'>Accueil</a></li>
                            <li><a href='profil.php' class='navig'>Profil</a></li>  
                            <li><a href='index.php' class='navig'>Déconnexion</a></li>";
                            
                    }                
                ?>
            </ul>
        </nav>
    </header>
    <main id="mainInscription">
        <div id="formu">
            <form  id="formInscription" action="inscription.php" method="post">
                <input type="text" name="login" id="login" class="champs" placeholder="login">
                <input type="text" name="prenom" id="prenom" class="champs" placeholder="prenom">
                <input type="text" name="nom" id="nom" class="champs" placeholder="nom">
                <input type="text" name="password" id="password" class="champs" placeholder="mot de passe">
                <input type="text" name="confirmPassword" id="confirmPassword" class="champs" placeholder="confirmation mot de passe">
                <input type="submit" name="submit" value="envoyer" id="bouttonIns">      
                <?php
                    echo "<p id='msgError'>$error</p>";     
                ?>     
            </form>
        </div>
    </main>
    <footer id="foot">
        <div >
            <a id="lien" href="https://github.com/cyril-porez">GITHUB</a>
        </div>
    </footer>
</body>
</html>