<?php
    session_start();
    $connex = mysqli_connect("localhost", "root", "", "cyril-porez_moduleconnexion");
    mysqli_set_charset($connex, 'utf8');
  
    $user = $_SESSION["users"];
    $infoUser = mysqli_query($connex, "SELECT id, login, prenom, nom, password FROM utilisateurs WHERE login = '$user'");
    $info = mysqli_fetch_all($infoUser, MYSQLI_ASSOC);
    $error = "";

    if (empty($_SESSION["users"]))
    {
        header("Location: index.php");
    }

    if (!empty($_POST["login"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["password"])) {
        $login = $_POST['login'];
        $prenom = $_POST['prenom'];
        $nom = $_POST["nom"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $verifLogin = mysqli_query($connex, "SELECT login FROM utilisateurs WHERE login = '$login'");
        $result = mysqli_fetch_all($verifLogin);
        if (count($result) == 0) {
            echo "verif login";
            if ($password == $confirmPassword){
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);          
                $update = mysqli_query($connex, "UPDATE utilisateurs SET login = '$login', prenom = '$prenom', nom = '$nom', password = '$password' WHERE login = '$user'");
                $_SESSION["users"] = $login;
                header("Refresh:0");
            }
            else {
                $error = "* error confirmation mot de passe";
            }
        }
        else {
            $error = "* Ce login existe déjà";
        }
    }
    else if (isset($_POST["login"]) && isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["password"])) {
           $error = "* oubli champ";
    }
    
    
    //var_dump($_SESSION);

   
    
   
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profil</title>
</head>
<body>
    <header>
    <nav id="navbar">
            <h1 id="porezuino">POREZUINO</h1>
            <ul id="menu">
                <?php
                     if (isset($_SESSION["users"])){
                        if ($_SESSION["users"] == "admin"){
                            echo "
                                <li><p id='conn'>Bonjour  " . $_SESSION['users'] ." !</p></li>
                                <li><a href='admin' class='navig'>Admin</a></li>
                                <li><a href='deconnexion.php' class='navig'>Déconnexion</a></li>";
                        }
                        elseif ($_SESSION["users"] != "admin") {
                            echo "
                                <li><p id='conn'>Bonjour  " . $_SESSION['users'] ." !</p></li>
                                <li><a href='index.php' class='navig'>Accueil</a></li>
                                <li><a href='profil.php' class='navig'>Profil</a></li>
                                <li><a href='deconnexion.php' class='navig'>Déconnexion</a></li>";
                            
                        }
                    }
                    if (isset($_SESSION["users"])  == false) {
                             echo "
                             <li><a href='index.php' class='navig'>Accueil</a></li>
                             <li><a href='inscription.php' class='navig'>Inscription</a></li>
                             <li><a href='connexion.php' class='navig'>Connexion</a></li>";
                    }                
                ?>
            </ul>
        </nav>
    </header>
    <main id="mainProfil">
        <div id="formuProfil">
            <form action="profil.php" method="post" id="formProfil"> 
                <input type="text" name="login" id="login" class="champsProfil" placeholder="login" value=<?php echo $info[0]["login"]; ?>>
                <input type="text" name="prenom" id="prenom" class="champsProfil" placeholder="prenom" value=<?php echo $info[0]["prenom"]; ?>>
                <input type="text" name="nom" id="nom" class="champsProfil" placeholder="nom" value=<?php echo $info[0]["nom"]; ?>>
                <input type="text" name="password" id="password" class="champsProfil" placeholder="password" value=<?php echo $info[0]["password"]; ?>>
                <input type="text" name="confirmPassword" id="confirmPassword" class="champs" placeholder="confirmation mot de passe">
                <?php
                    echo "<p id='msgError'>$error</p>";
                ?>
                <input type="submit" name="modif" id="boutonModif" value="modifier">
            </form>
        </div>
    </main>
    <footer id="foot">
        <div >
            <a id="lien" href="https://github.com/cyril-porez/module-connexion">GITHUB</a>
        </div>
    </footer>
</body>
</html>