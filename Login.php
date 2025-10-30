<?php
include 'db_connexion.php';

if (!isset($_SESSION["connecte"])) {
    $_SESSION["connecte"] = false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email']) && !empty($_POST['mdp'])) {
    $email_soumis = $_POST["email"];
    $mdp_soumis = $_POST["mdp"];
    $stmt = $pdo->prepare("SELECT id_utilisateur, nom, prenom, email, mot_de_passe FROM utilisateur WHERE email = :email_user");
    $stmt->bindParam(':email_user', $email_soumis);
    $stmt->execute();
    $user = $stmt->fetch();
    if ($user && password_verify($mdp_soumis, $user['mot_de_passe'])) {
        $_SESSION["connecte"] = true;
        $_SESSION["id"] = $user['id_utilisateur']; 
        $_SESSION["nom"] = $user['nom'];
        $_SESSION["prenom"] = $user['prenom'];
        $_SESSION["email"] = $email_soumis;
        $_SESSION["mdp"] = $mdp_soumis;
        
        header("Location: Acceuil.php");
        exit();
}
    else {
    $_SESSION["connecte"] = false;
    $msg_error = "Identifiants incorrects ou non existants, veuillez réessayer ou créer un compte.";
}
}

// --- MDPS --- Brian : tiévrmleboss; Bob : bobybob; 
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <title>MyFestival-Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="General.css">
</head>
<header>
    <h2 class = "titre_page">Bienvenue sur MyFestival !</h1>
    <h4 class = "sstitre_page">Veuillez vous connectez pour acceder a votre espace :</h3>
</header>
<body class = "body">
    <form class = "form_log " method = "post" action = "<?php echo ($_SERVER['PHP_SELF']); ?>">
        <label class = "mail">Mail :</label><br>
        <input class = "mail_inpt"type="text" name="email" required><br/>

        <label class = "mdp">Mot de passe : </label><br>
        <input class = "mdp_inpt"type="password" name="mdp" required><br/>

        <input class = "seco_inpt"type="submit" value="Se connecter">

        <a class = "lien" href="Cre.compte.php">Crée un compte</a>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email']) && !empty($_POST['mdp'])) {
    if (isset($msg_error)): ?>
        <div class= 'msg_err_login'>
            <?php echo $msg_error; ?>
        </div>
        <?php endif;} ?>
</body>
</html>


