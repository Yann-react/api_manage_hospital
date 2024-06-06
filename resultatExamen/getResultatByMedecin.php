<?php
require_once "../conn.php";
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');

$idMedecin = isset($_GET['idMedecin']) ? $_GET['idMedecin'] : '';

try {
    $stmt = $conn->prepare("SELECT resultatexamen.*, dossier_patient.nompat, dossier_patient.prenompat, examenComplement.libeExamen FROM resultatexamen INNER JOIN consultation ON resultatexamen.idConsultation = consultation.idconsultation INNER JOIN dossier_patient ON consultation.iddossier_patient = dossier_patient.iddossier_patient INNER JOIN examenComplement ON resultatexamen.idExemanCompl = examenComplement.idExamenCompl WHERE consultation.idmedecin = :idMedecin");
    $stmt->bindValue(':idMedecin', $idMedecin, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = array(
        "success" => true,
        "data" => $results
    );
} catch(PDOException $e) {
    echo($e->getMessage());
    $result = array(
        "success" => false
    );
}

echo(json_encode($result));
?>
