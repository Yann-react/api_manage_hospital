<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("UPDATE accouchement SET dateAccouchement = :dateAccouchement, descriptionAccouchement = :descriptionAccouchement, idTechnicien = :idTechnicien, idConsultation = :idConsultation WHERE idAccouchement = :idAccouchement");
        $stmt->bindParam(':idAccouchement', $idAccouchement);
        $stmt->bindParam(':dateAccouchement', $dateAccouchement);
        $stmt->bindParam(':descriptionAccouchement', $descriptionAccouchement);
        $stmt->bindParam(':idTechnicien', $idTechnicien);
        $stmt->bindParam(':idConsultation', $idConsultation);
        $idAccouchement = $_GET["idAccouchement"];
        $dateAccouchement = $_GET["dateAccouchement"];
        $descriptionAccouchement = $_GET["descriptionAccouchement"];
        $idTechnicien = $_GET["idTechnicien"];
        $idConsultation = $_GET["idConsultation"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Accouchement mis à jour avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la mise à jour de l'accouchement"
        );
    }
    echo(json_encode($result));
?>
