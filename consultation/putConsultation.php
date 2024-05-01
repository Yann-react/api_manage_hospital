<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("UPDATE consultation SET dateconsult = :dateconsult, constantes = :constantes, diagnostic = :diagnostic, pathologie = :pathologie, precription = :precription, date_rdv = :date_rdv, idmedecin = :idmedecin, iddossier_patien = :iddossier_patien WHERE idconsultation = :idconsultation");
        $stmt->bindParam(':idconsultation', $idconsultation);
        $stmt->bindParam(':dateconsult', $dateconsult);
        $stmt->bindParam(':constantes', $constantes);
        $stmt->bindParam(':diagnostic', $diagnostic);
        $stmt->bindParam(':pathologie', $pathologie);
        $stmt->bindParam(':precription', $precription);
        $stmt->bindParam(':date_rdv', $date_rdv);
        $stmt->bindParam(':idmedecin', $idmedecin);
        $stmt->bindParam(':iddossier_patien', $iddossier_patien);
        $idconsultation = $_GET["idconsultation"];
        $dateconsult = $_GET["dateconsult"];
        $constantes = $_GET["constantes"];
        $diagnostic = $_GET["diagnostic"];
        $pathologie = $_GET["pathologie"];
        $precription = $_GET["precription"];
        $date_rdv = $_GET["date_rdv"];
        $idmedecin = $_GET["idmedecin"];
        $iddossier_patien = $_GET["iddossier_patien"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Consultation mise à jour avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la mise à jour de la consultation"
        );
    }
    echo(json_encode($result));
?>
