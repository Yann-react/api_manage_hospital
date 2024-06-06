<?php
require_once "../conn.php";
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');

$idMedecin = isset($_GET['idMedecin']) ? $_GET['idMedecin'] : '';

try {
    $stmt = $conn->prepare("
        SELECT
          t.idTrait,
          t.idActeMed,
          t.idConsultation,
          am.libeActeMedi AS libActe,
          t.objetActe,
          t.observationActe,
          t.etats,
          dp.nompat AS nomPatient,
          dp.prenompat AS prenomPatient
        FROM
          traitement t
        INNER JOIN actemedical am ON t.idActeMed = am.idActeMedi
        INNER JOIN consultation c ON t.idConsultation = c.idConsultation
        INNER JOIN dossier_patient dp ON c.iddossier_patient = dp.iddossier_patient
        WHERE c.idmedecin = :idMedecin
    ");
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
