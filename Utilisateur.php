<?php
session_start();
include ("db_connexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['modif_mdp'])) {
        header("Location: modification_mdp.php");
    }
    elseif (isset($_POST['suppr_compte'])) {
        $stmt = $pdo->prepare('DELETE FROM utilisateur WHERE `utilisateur`.`id_utilisateur` = :id_utilisateur');
        $id_utilisateur_a_supprimer = $_SESSION['id'];
        $stmt->bindParam(':id_utilisateur', $id_utilisateur_a_supprimer, PDO::PARAM_INT);
        $stmt->execute();
        session_destroy();
        header("Location: Main.php");
        exit();
}

}

?>

<html>
    <head>
        <title>MyFestival--Mon compte</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="General.css">
    </head>
    <body class = "body_utilisateur">
        <h1 class = "titre_page">Mon compte</h1>
        <form class = "form_log" method = "post" action = "<?php echo ($_SERVER['PHP_SELF']); ?>">
            <p class = "mail">Nom : <?php echo $_SESSION["nom"]; ?></p>
            <p class = "mail">Prénom : <?php echo $_SESSION["prenom"]; ?></p>
            <p class = "mail">Email : <?php echo $_SESSION["email"]; ?></p>
            <p class = "mail">Mot De Passe: <?php echo $_SESSION["mdp"]; ?></p><br>
            <input class = "seco_inpt"type="submit" value="Modifier mon mot de passe" name = "modif_mdp"><br>
            <br>
            <input class = "seco_inpt"type="submit" value="Supprimer mon compte" name = "suppr_compte">

        </form>
        <a href="Acceuil.php" class = "lien">Retour à l'acceuil</a>
        <a href="Deconnexion.php" class = "lien">Se déconnecter</a>
    </body>

</html>