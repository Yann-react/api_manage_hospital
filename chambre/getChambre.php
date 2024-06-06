<?php
require_once "../conn.php";
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');

try {
    // Requête pour récupérer les chambres et compter les lits dans chaque chambre
    $stmt = $conn->prepare("
        SELECT c.numeroChambre, c.descriptionChambre, COUNT(l.numerolit) as nombreLits
        FROM chambre c
        LEFT JOIN lit l ON c.numeroChambre = l.numerochambre
        GROUP BY c.numeroChambre, c.descriptionChambre
    ");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $result = array(
        "success" => true,
        "data" => $results
    );
} catch(PDOException $e) {
    $result = array(
        "success" => false,
        "message" => $e->getMessage()
    );
}

echo(json_encode($result));
?>
