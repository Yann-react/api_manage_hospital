<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("SELECT h.*, l.numerochambre, p.nompat, p.prenompat FROM hospitalisation h JOIN lit l ON h.idLit = l.numerolit JOIN consultation c ON h.idConsultation = c.idconsultation JOIN dossier_patient p ON c.iddossier_patient = p.iddossier_patient");
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
