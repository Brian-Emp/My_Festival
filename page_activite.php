<?php
include('connexion.php');

// Exécuter la requête
try {
    $stmt = $conn->prepare("SELECT * FROM activite");
    $stmt->execute();
    $activites = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Activités</title>
    <style>
        body { font-family: Arial; background: #f5f5f5; margin: 20px; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { border: 1px solid #ccc; padding: 10px; }
        th { background: #009879; color: white; }
    </style>
</head>
<body>
    <h1>Liste des Activités</h1>

    <?php if (empty($activites)): ?>
        <p>Aucune activité trouvée dans la base.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <?php foreach(array_keys($activites[0]) as $colonne): ?>
                        <th><?= htmlspecialchars($colonne) ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($activites as $a): ?>
                    <tr>
                        <?php foreach($a as $val): ?>
                            <td><?= htmlspecialchars($val) ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>