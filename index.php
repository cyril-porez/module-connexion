<?php
    session_start();
    $connex = mysqli_connect("localhost", "root", "", "cyril-porez_moduleconnexion");
    mysqli_set_charset($connex, 'utf8');
    //cho $_SESSION["users"];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
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
                                <li><a href='admin.php' class='navig'>Admin</a></li>
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
    <main id="mainIndex">
        <div id="container">
            <div id="container2">
                <img class="arduino" src="image/Arduino_uno.jpg" alt="arduino1">
                <img class="arduino" src="image/arduino_edge.jpg" alt="arduino2">
                <img class="arduino" src="image/arduino_nano.jpg" alt="arduino3">
            </div>
            <div id="container3">
                <img class="arduino" src="image/arduino_zero.jpg" alt="arduino4">
                <img class="arduino" src="image/Blogpost-Cover.jpg" alt="arduino5">
                <img class="arduino" src="image/arduino1.jpg" alt="arduino6">
            </div>
            <div id="container4">
                <img class="arduino" src="image/tinker.jpg" alt="arduino7">
                <img class="arduino" src="image/wheelson.jpg" alt="arduino8">
                <img class="arduino" src="image/mkr.jpg" alt="arduino9">
            </div>
        </div>        
    </main>
    <footer id="foot">
         <div >
            <a  id="lien" href="https://github.com/cyril-porez/module-connexion">GITHUB</a>
        </div>
    </footer>
</body>
</html>