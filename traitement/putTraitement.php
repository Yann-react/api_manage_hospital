<?php
require_once "../conn.php";
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');

try {
    $stmt = $conn->prepare("UPDATE traitement SET idActeMed = :idActeMed, idConsultation = :idConsultation, objetActe = :objetActe, observationActe = :observationActe, etats = :etats WHERE idTrait = :idTrait");
    $stmt->bindParam(':idActeMed', $idActeMed);
    $stmt->bindParam(':idConsultation', $idConsultation);
    $stmt->bindParam(':objetActe', $objetActe);
    $stmt->bindParam(':observationActe', $observationActe);
    $stmt->bindParam(':etats', $etats);
    $stmt->bindParam(':idTrait', $idTrait);

    $idActeMed = $_GET["idActeMed"];
    $idConsultation = $_GET["idConsultation"];
    $objetActe = $_GET["objetActe"];
    $observationActe = $_GET["observationActe"];
    $etats = $_GET["etats"];
    $idTrait = $_GET["idTrait"];
    $stmt->execute();

    $result = array(
        "success" => true
    );
} catch(PDOException $e) {
    echo($e->getMessage());
    $result = array(
        "success" => false
    );
}

echo(json_encode($result));
?>
