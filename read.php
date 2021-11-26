<?php
    session_start();
    $connex = mysqli_connect("localhost", "root", "", "cyril-porez_moduleconnexion");
    mysqli_set_charset($connex, 'utf8');
    $user = $_GET["read"];
    $requete = mysqli_query($connex,  "SELECT * FROM utilisateurs WHERE id='$user'");
    $readUser = mysqli_fetch_all($requete, MYSQLI_ASSOC); 
    if (empty($_SESSION["users"])) {
        header("Location: index.php");
    }
    else if (isset($_SESSION['users']) && $_SESSION["users"] != 'admin') {
       header("Location: index.php");
    }

    if (isset($_POST["submit"])) {
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
    <title>CRUD admin Read</title>
</head>
<body>
    <header>

    </header>
    <main>
        <div id="formuCrudRead">
            <form action="" method="post" id="formCrudRead">
                <input type="text" name="id" placeholder="id" class="champsRead" value=<?php echo $readUser[0]['id']; ?>>
                <input type="text" name="login" placeholder="login" class="champsRead" value=<?php echo $readUser[0]['login']; ?>>
                <input type="text" name="prenom" placeholder="prenom" class="champsRead" value=<?php echo $readUser[0]['prenom']; ?>>
                <input type="text" name="nom" placeholder="nom" class="champsRead" value=<?php echo $readUser[0]['nom']; ?>>
                <input type="text" name="password" placeholder="password" class="champsRead" value=<?php echo $readUser[0]['password']; ?>>
                <input type="submit" name="submit" id="butonRead" value="retour">
            </form>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>