<?php
    session_start();
    $connex = mysqli_connect("localhost", "root", "", "cyril-porez_moduleconnexion");
    mysqli_set_charset($connex, 'utf8');
 
    $userUpdate = $_GET["update"];
    $requete = mysqli_query($connex, "SELECT * FROM utilisateurs WHERE id='$userUpdate'");
    $userModif = mysqli_fetch_all($requete, MYSQLI_ASSOC);

    $error = "";

    if (empty($_SESSION["users"])) {
        header("Location: index.php");
    }
    else if (isset($_SESSION["users"]) && $_SESSION["users"] != 'admin') {
       header("Location: index.php");
    }

    if (isset($_POST["editer"])) {
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
                    $update = mysqli_query($connex, "UPDATE utilisateurs SET login='$login', prenom='$prenom', nom='$nom', password='$password' WHERE id = '$userUpdate'");
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
    }
    else if (isset($_POST["back"])) {
        header("Location: admin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CRUD Admin update</title>
</head>
<body>
    <header>

    </header>
    <main>
        <div id="formuCrudUpdate">
            <form action="" method="post" id="formCrudUpdate">
                <input type="text" name="login" placeholder="login" class="champsCrudUpdate" value=<?php echo $userModif[0]["login"] ?>>
                <input type="text" name="prenom" placeholder="prenom" class="champsCrudUpdate" value=<?php echo $userModif[0]["prenom"] ?>>
                <input type="text" name="nom" placeholder="nom" class="champsCrudUpdate" value=<?php echo $userModif[0]["nom"]; ?>>
                <input type="text" name="password" placeholder="password" class="champsCrudUpdate" value=<?php echo $userModif[0]["password"]; ?>>
                <input type="text" name="confirmPassword" id="confirmPassword" class="champs" placeholder="confirmation mot de passe">
                <?php
                    echo "<p id='msgError'>$error</p>";
                ?>
                <div id="containerBouton">
                    <input type="submit" name="editer" id="butonUpdate" value="editer">
                    <input type="submit" name="back" id="back" value="retour">
                </div>
            </form>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>