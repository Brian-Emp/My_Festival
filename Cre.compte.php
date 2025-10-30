<?php
session_start();
include 'db_connexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email']) && !empty($_POST['mdp'])) {
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM utilisateur WHERE email = :email');
    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->fetchColumn() > 0) {
        $message_error = "L'adresse email est déjà utilisée. Veuillez en choisir une autre.";
    } else {
        if ($_POST["confirm"] === $_POST["mdp"]) {
            $email = $_POST["email"];
            $mdp = $_POST["mdp"];
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $confirmp = $_POST["confirm"];
            $hashed_password = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO `utilisateur` (`nom`, `prenom`, `email`, `mot_de_passe`) VALUES (:nom, :prenom, :email, :mdp)");        
        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'mdp' => $hashed_password
        ]);
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["mdp"] = $_POST["mdp"];
        $_SESSION["confirm"] = $_POST["confirm"];
        $_SESSION["nom"] = $_POST["nom"];
        $_SESSION["prenom"] = $_POST["prenom"];
        $_SESSION["connecte"] = true;

        echo "Compte créé avec succès ! Bienvenue sur MyFestival " . $_SESSION["prenom"] . ".";
        header('Location: Login.php');
        exit();
    }
        else {
            $_SESSION["connecte"] = false;
            $message_error = "Les mots de passe ne correspondent pas. Veuillez réessayer.";
        }  
    }
}
        
?>

<!DOCTYPE html>
<html>
<head>
    <title>MyFestival-Inscription</title>
    <link rel="stylesheet" href="General.css">
</head>
<body class = "body">
    <h1 class = "titre_page">Création de votre Compte</h1>
    <form class = "form_log" method="POST" action="<?php echo ($_SERVER['PHP_SELF']); ?>">

        <label class = "mail"> Nom : </label><br>
        <input class = "mail_inpt" type="text" name="nom" required><br>

        <label class = "mail">Prenom : </label><br>
        <input class = "mail_inpt" type="text" name="prenom" required><br>
        
        <label class = "mail"> Mail: </label><br>
        <input class = "mail_inpt" type="text" name="email" required><br>
        
        <label class = "mail"> Mot de passe: </label><br>
        <input class = "mail_inpt" type="password" name="mdp" required><br>
        
        <label class = "mail"> Confirmation du mot de passe: </label><br>
        <input class = "mail_inpt" type="password" name="confirm" required><br><br>
        
        <input class = "seco_inpt" type="submit" value="Valider">
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($message_error)): ?>
        <div class= 'msg_err_login'>
            <?php echo $message_error; ?>
        </div>
        <?php endif;} ?>
</body>
</html>