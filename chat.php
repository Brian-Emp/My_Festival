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
</head>
<body>
<div class="chat-container">
    <h2 style="text-align:center;">💬Chat - MyFestival💬</h2>
    <link rel="stylesheet" href="chat.css"> 
    <div class="back-button">
        <a href="Acceuil.php">← Accueil</a>
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
<script>
    const messagesDiv = document.querySelector('.messages');
    if (messagesDiv) {
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }
</script>
</body>
</html>



