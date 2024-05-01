<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("UPDATE hospitalisation SET idLit = :idLit, idConsultation = :idConsultation, dateDebut = :dateDebut, dateFin = :dateFin WHERE idHosp = :idHosp");
        $stmt->bindParam(':idHosp', $idHosp);
        $stmt->bindParam(':idLit', $idLit);
        $stmt->bindParam(':idConsultation', $idConsultation);
        $stmt->bindParam(':dateDebut', $dateDebut);
        $stmt->bindParam(':dateFin', $dateFin);
        $idHosp = $_GET["idHosp"];
        $idLit = $_GET["idLit"];
        $idConsultation = $_GET["idConsultation"];
        $dateDebut = $_GET["dateDebut"];
        $dateFin = $_GET["dateFin"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Hospitalisation mise à jour avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la mise à jour de l'hospitalisation"
        );
    }
    echo(json_encode($result));
?>
