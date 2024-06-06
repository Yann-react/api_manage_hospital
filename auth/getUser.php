<?php
require_once "../conn.php";
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$titre = $_GET["titre"];
$id = $_GET["id"];

try {
    if ($titre === "medecin") {
        $stmt = $conn->prepare("SELECT nomMed, prenomMed FROM medecin WHERE idmedecin = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $resultat = $stmt->fetch();
        $result = array(
            "success" => true,
            "message" => "Données récupérées avec succès",
            "data" => array(
                "nom" => $resultat["nomMed"],
                "prenom" => $resultat["prenomMed"]
            )
        );
    } else if ($titre === "technicien") {
        $stmt = $conn->prepare("SELECT nomTechn, prenomTechn FROM technicien WHERE idTechnicien = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $resultat = $stmt->fetch();
        $result = array(
            "success" => true,
            "message" => "Données récupérées avec succès",
            "data" => array(
                "nom" => $resultat["nomTechn"],
                "prenom" => $resultat["prenomTechn"]
            )
        );
    } else {
        $result = array(
            "success" => false,
            "message" => "Titre invalide"
        );
    }
} catch (PDOException $e) {
    $result = array(
        "success" => false,
        "message" => "Erreur lors de la récupération des données : " . $e->getMessage()
    );
}

echo json_encode($result);
