<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("SELECT a.*, d.nompat AS nom_patient, d.prenompat AS prenom_patient, t.nomTechn AS nom_technicien, t.prenomTechn AS prenom_technicien FROM accouchement a INNER JOIN consultation c ON a.idConsultation = c.idConsultation INNER JOIN  dossier_patient d ON c.iddossier_patient = d.iddossier_patient INNER JOIN technicien t ON a.idTechnicien = t.idTechnicien");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = array(
            "success" => true,
            "data" => $results
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
