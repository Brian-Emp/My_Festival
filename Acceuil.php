<?php
session_start();
include("db_connexion.php");
$options_photo_concert = [
    "./photo_concert/1header-konzertfotografie.jpeg",
    "./photo_concert/istockphoto-1806011581-612x612.jpg",
    "./photo_concert/media_15955bf89f635a586d897b5c35f7a447b495f6ed7.jpg",
    "./photo_concert/organiser-un-concert-en-7-etapes.png",
    "./photo_concert/public-enthousiaste-regardant-feux-artifice-confettis-s-amusant-lors-festival-musique-nuit-espace-copie_637285-559.jpg",
    "./photo_concert/scene-de-concert-foule-lumieres.jpg"
];
shuffle($options_photo_concert);
$photo_choisie = current($options_photo_concert);

    $stmt = $pdo->prepare("SELECT nom_artiste, nom_scene, heure_debut, photo FROM concert");
    $stmt->execute();
    $concert = $stmt->fetch();
    $_SESSION["artiste"] = $concert["nom_artiste"];
    $_SESSION["scene"] = $concert["nom_scene"];
    $_SESSION["heure"] = $concert["heure_debut"];
    if ($_SESSION["connecte"] == true) {
        $stmt2 = $pdo->prepare("SELECT titre, description, lieu, heure_debut FROM activite");
        $stmt2->execute();
        $activitee = $stmt2->fetch();
        $_SESSION["activite"] = $activitee["titre"];
        $_SESSION["descr"] = $activitee["description"];
        $_SESSION["lieu"] = $activitee["lieu"];
        $_SESSION["heure"] = $activitee["heure_debut"];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'selem';
}
?>

<html>
<head>
    <title>MyFestival--Acceuil</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="General.css">
</head>
<body class = "body">
    <?php if ($_SESSION['connecte'] == true) { ?>
        <h1 class = "titre_page">Bienvenue sur MyFestival <?php echo $_SESSION["prenom"]; ?> !</h1>
        <a href="Utilisateur.php" class = "lien">Mon compte</a>
    <?php } else { ?>
        <h1 class = "titre_page"> Bienvenue sur Myfestival !</h1>
        <h3 class = "connect_act"> Veuillez vous connecter pour acceder a la liste des activitées et bien plus encore !!</h3>
        <a href = "Login.php" class = "lien"> Se connecer</a>
    <?php } ?>
<h3 class = "sslistes_acc_concert">Liste des concerts prévus :<br></h3>
<ul class = "liste_concert">
<?php
while ($concert = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<li>";
    echo "<p>" . htmlspecialchars($concert['nom_artiste']) . "</p>";
    echo htmlspecialchars($concert['nom_scene']) . "<br>";
    echo htmlspecialchars($concert['heure_debut']). "<br>"; ?>
    <img  class = "photo_concert" id="photo" src= <?php $photo_choisie ?> alt="photo_concert"/><?php
    echo "</li> <br>";
}
?>
</ul>
<h3 class = "sslistes_acc_act">Liste des activitées prévues :<br></h3>
<ul class = "liste_activite">
<?php
if ($_SESSION["connecte"] == true) {
while ($activitee = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    echo "<li>";
    echo "Activité : <p>" . htmlspecialchars($activitee['titre']) . "</p> - ";
    echo "Description : " . htmlspecialchars($activitee['description']) . "<br> - ";
    echo "Lieu : " . htmlspecialchars($activitee['lieu']) . "<br> - ";
    echo "Heure : " . htmlspecialchars($activitee['heure_debut']). "<br>";
    ?> <form class = "s'inscrire " method = "post" action = "<?php echo ($_SERVER['PHP_SELF']); ?>"><button name="Inscription">S'inscrire</button></form><?php
    echo "</li> <br>";
}
}
?>
</ul>
<a href="Deconnexion.php" class = "lien">Se déconnecter</a>
</body>
</html>