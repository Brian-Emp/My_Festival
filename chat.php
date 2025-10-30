<?php
session_start();
include 'db_connexion.php'; 


if (!isset($_SESSION['connecte']) || $_SESSION['connecte'] !== true || !isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}
$id_utilisateur = $_SESSION['id'];


if (isset($_POST['message']) && !empty(trim($_POST['message']))) {
    $message = htmlspecialchars(trim($_POST['message']));
    $sql = "INSERT INTO message (contenue_message, date_envoi_message, id_utilisateur)
            VALUES (:msg, NOW(), :id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':msg' => $message,
        ':id' => $id_utilisateur
    ]);
    
    header("Location: chat.php");
    exit;
}


$sql = "SELECT m.contenue_message, m.date_envoi_message, u.prenom, u.nom
        FROM message m
        JOIN utilisateur u ON m.id_utilisateur = u.id_utilisateur
        ORDER BY m.date_envoi_message ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Chat - MyFestival</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; margin: 0; padding: 0; }
        .chat-container { width: 60%; margin: 40px auto; background: #fff; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
        .messages { height: 400px; overflow-y: scroll; padding: 10px; border-bottom: 1px solid #ccc; }
        .message { margin-bottom: 10px; }
        .auteur { font-weight: bold; color: #2a5d84; }
        .date { font-size: 0.8em; color: gray; }
        form { display: flex; padding: 10px; }
        input[type=text] { flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        button { padding: 10px 20px; background: #2a5d84; color: white; border: none; border-radius: 5px; margin-left: 5px; cursor: pointer; }
        button:hover { background: #1e4663; }
    </style>
    <meta http-equiv="refresh" content="5">
</head>
<body>
<div class="chat-container">
    <h2 style="text-align:center;">💬Chat - MyFestival💬</h2>
<div class="back-button" style="margin: 30px 0; text-align: left;">
<a href="Acceuil.php"style="padding: 10px 20px; background: #e13badff; color: white; border-radius: 5px; text-decoration: none;">← Accueil</a>
</div>
    <div class="messages"> 
        <?php foreach ($messages as $m): ?>
            <div class="message">
                <span class="auteur"><?= htmlspecialchars($m['prenom'].' '.$m['nom']) ?></span>
                <span class="date">[<?= date('d/m H:i', strtotime($m['date_envoi_message'])) ?>]</span> :
                <span><?= nl2br(htmlspecialchars($m['contenue_message'])) ?></span>
            </div>
        <?php endforeach; ?>
    </div>

    <form method="POST" action="">
        <input type="text" name="message" placeholder="Écrivez votre message..." required>
        <button type="submit">Envoyer</button>
    </form>
</div>
</body>
</html>

