<?php
    session_start();
    $connex = mysqli_connect("localhost", "root", "", "cyril-porez_moduleconnexion");
    mysqli_set_charset($connex, 'utf8');
    
     $requete = mysqli_query($connex, "SELECT * FROM utilisateurs ");
     $users = mysqli_fetch_all($requete, MYSQLI_ASSOC);
     $error = "";

     if (empty($_SESSION["users"])) {
         header("Location: index.php");
     }
     else if (isset($_SESSION["users"]) && $_SESSION["users"] != 'admin') {
        header("Location: index.php");
     }  
    
    if (!empty($_POST["login"])  && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["password"])) {
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
                header("Refresh:0");
            }
            else {
                 $error = "* error confirmation mot de passe";
            }
        }    
        else {
            $error = "Ce login existe déjà";
        }
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
                    if (isset($_SESSION['users']) == 'admin'){
                        echo "
                                <li><p id='conn'>Bonjour  " . $_SESSION['users'] ." !</p></li>
                                <li><a href='index.php' class='navig'>Accueil</a></li>
                                <li><a href='deconnexion.php' class='navig'>Déconnexion</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </header>
    <main id="mainAdmin">
        <form action="admin.php" method="post" id="trio">
            <input type="submit" id="createUser" name="create" value="Créer un utilisateur">
            <input type="submit" id="affichUser" name="affich" value="Afficher les utilisateurs">
        <?php
        if(isset($_POST['create']) || isset($_POST['affich']))
        {
        ?>
            <input type="submit" id="efface" name="actu" value="X">
            <?php
                if(isset($_POST['actu'])){
                    header('location: admin.php');
                }
            ?>
        </form>
        <?php
        }
        ?>
        <?php
            if(isset($_POST["create"])){
                echo "
                <form action='' method='post' id='adminInscri'>
                    <input type='text' name='login' placeholder='login'>
                    <input type='text' name='prenom' placeholder='prenom'>
                    <input type='text' name='nom' placeholder='nom'>
                    <input type='text' name='password' placeholder='password'>
                    <input type='text' name='confirmPassword' placeholder='confirmPassword'>
                    <input type='submit' name='submit' id='créer' value='créer'>                   
                </form>";
            }
            echo "<p id='msgError'>$error</p>";
            if(isset($_POST["affich"])){
        ?>        
        <div id="table">
            <table >
                <thead>
                    <th>id</th>
                    <th>login</th>
                    <th>prénom</th>
                    <th>nom</th>
                    <th>password</th>
                    <th colspan='3'>éditer</th>
                </thead>
                <tbody>                
                    <?php
                        foreach($users as $user)
                        {
                            echo 
                            '<tr>
                                <td id="idAdmin" class="textAdmin">' . $user["id"] . '</td>
                                <td class="textAdmin">' . $user["login"] . '</td>
                                <td class="textAdmin">' . $user["prenom"] . '</td>
                                <td class="textAdmin">' . $user["nom"] . '</td>
                                <td class="textAdmin">' . $user["password"] . '</td>';?>                       
                                
                               <form action="read.php" method="get">
                                    <td><button type="submit" name="read" id="read" value=<?php echo $user["id"] ?>>Lire</td>
                                </form> 
                                <form action="update.php" method="get">
                                    <td><button type="submit" name="update" id="update" value=<?php echo $user["id"]; ?>>modifier</button></td>
                                </form>
                                <form action="delete.php" method="get">
                                    <td><button type="submit" name="delete" id="delete" value=<?php echo $user["id"]; ?>>supprimer</button></td>
                                </form>
                            </tr><?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer id="foot">
        <div >
            <a  id="lien" href="https://github.com/cyril-porez/module-connexion">GITHUB</a>
        </div>
    </footer>
</body>
</html>