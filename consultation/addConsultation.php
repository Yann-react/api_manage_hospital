<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("INSERT INTO consultation (dateconsult,constantes,diagnostic,pathologie,	precription,date_rdv,idmedecin,	iddossier_patient) VALUES (:dateconsult,:constantes,:diagnostic,:pathologie,	:precription,:date_rdv,:idmedecin,	:iddossier_patien)");
        $stmt->bindParam(':dateconsult', $dateconsult);
        $stmt->bindParam(':constantes', $constantes);
        $stmt->bindParam(':diagnostic', $diagnostic);
        $stmt->bindParam(':pathologie', $pathologie);
        $stmt->bindParam(':precription', $precription);
        $stmt->bindParam(':date_rdv', $date_rdv);
        $stmt->bindParam(':idmedecin', $idmedecin);
        $stmt->bindParam(':iddossier_patien', $iddossier_patien);

        $dateconsult = $_GET["dateconsult"];
        $constantes = $_GET["constantes"];
        $diagnostic = $_GET["diagnostic"];
        $pathologie 
        
        = $_GET["pathologie"];
        $precription = $_GET["precription"];
        $date_rdv = $_GET["date_rdv"];
        $idmedecin = $_GET["idmedecin"];
        $iddossier_patien = $_GET["iddossier_patien"];
        $stmt->execute();

        // Récupérer l'ID de la dernière ligne insérée
        $lastId = $conn->lastInsertId();

        $result = array(
            "success" => true,
            "id" => $lastId
        );

    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false
        );
    }

    echo(json_encode($result));
?>
