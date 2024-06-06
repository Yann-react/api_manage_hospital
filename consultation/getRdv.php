<?php
require_once "../conn.php";
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');

try {
    $stmt = $conn->prepare("
        SELECT
            consultation.date_rdv,
            medecin.nomMed AS nom_medecin,
            medecin.prenomMed AS prenom_medecin,
            dossier_patient.nompat AS nom_patient,
            dossier_patient.prenompat AS prenom_patient
        FROM
            consultation
        INNER JOIN
            medecin ON consultation.idmedecin = medecin.idmedecin
        INNER JOIN
            dossier_patient ON consultation.iddossier_patient = dossier_patient.iddossier_patient
    ");

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $result = array(
        "success" => true,
        "data" => $results
    );
} catch (PDOException $e) {
    echo ($e->getMessage());
    $result = array(
        "success" => false
    );
}

echo (json_encode($result));
?>
