<?php
header('Content-Type: application/json');
include "connexion.php";
// définir le mode d'erreur PDO sur exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupérer les données du formulaire
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$telephone = $_POST['telephone'];
$mail = $_POST['mail'];
$ville = $_POST['ville'];
$date_start = $_POST['date_start'];
$date_finish = $_POST['date_finish'];
$produits = json_decode($_POST['produits']);

try {
    // Commencer une transaction
    $conn->beginTransaction();

    // Pour chaque produit, insérez une nouvelle ligne dans la table de réservations
    foreach ($produits as $id_produit) {
        $stmt = $conn->prepare("INSERT INTO reservations (id_produit, nom, prenom, telephone, mail, ville, date_start, date_finish)
        VALUES (:id_produit, :nom, :prenom, :telephone, :mail, :ville, :date_start, :date_finish)");

        $stmt->bindParam(':id_produit', $id_produit);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':date_start', $date_start);
        $stmt->bindParam(':date_finish', $date_finish);

        $stmt->execute();
    }

    // Valider la transaction
    $conn->commit();
    echo json_encode(['message' => 'Réservation réussie !']);
} catch(PDOException $e) {
    // Annuler la transaction en cas d'erreur
    $conn->rollback();
    echo json_encode(['message' => 'Erreur : ' . $e->getMessage()]);
}