<?php
// 1. Paramètres de connexion
$host = 'localhost';          // L'hôte de votre BDD
$dbname = 'myfestival_db'; // Le nom de la base de données
$user = 'root';  // Le nom d'utilisateur (ex: root)
$password = 'root'; // Le mot de passe
$charset = 'utf8mb4';         // Encodage recommandé
$port = '8888'; 

// Le DSN (Data Source Name)
// AJOUTER port=8889 AU DSN
$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";

// Options PDO recommandées pour la gestion des erreurs et le mode de récupération des résultats
$options = [
    // Lancer des exceptions en cas d'erreur (mode très utile pour le debug)
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    // Laisser le driver préparer les requêtes (plus sûr)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Récupérer les résultats sous forme de tableau associatif par défaut
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     // 2. Création de l'objet PDO et connexion
     $pdo = new PDO($dsn, $user, $password, $options);
     
     // Note : Une fois la connexion réussie, la variable $pdo contient l'objet de connexion.

} catch (\PDOException $e) {
     // 3. Gestion des erreurs de connexion
     // En production, il est préférable d'afficher un message générique.
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>