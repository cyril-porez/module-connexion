<?php
    session_start();
    $connex = mysqli_connect("localhost", "root", "", "cyril-porez_moduleconnexion");

    if (empty($_SESSION["users"])) {
        header("Location: index.php");
    }
    else if (isset($_SESSION['users']) && $_SESSION["users"] != 'admin') {
       header("Location: index.php");
    }
  
   if(isset($_GET['delete'])){
       $delUser = $_GET["delete"];      
       if (isset($_POST["yes"])) {
            $delete = mysqli_query($connex, "DELETE FROM utilisateurs WHERE id='$delUser'");
            header("Location: admin.php");
        }
        else if (isset($_POST["no"]))
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
    <title>CRUD Admin Delete</title>
</head>
<body>
    <header>

    </header>
    <main>
        <h1 id="deleteUser">SUPPRIMER UN UTILISATEUR</h1>
        <div>
            <?php echo"<p id='textDelete'>Voulez-vous supprimer l'utilsateur id = $delUser ?</p>"; ?>
            <form method="post">
                <input type="submit" name="yes" id="yes" value="oui">
                <input type="submit" name="no" id="no" value="non">
            </form>            
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>