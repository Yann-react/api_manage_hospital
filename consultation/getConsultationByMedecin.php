<?php
require_once "../conn.php";
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$idMedecin = isset($_GET['idMedecin']) ? $_GET['idMedecin'] : '';

try {
    $query = "SELECT c.dateconsult, c.date_rdv, c.constantes, c.diagnostic, c.pathologie, c.precription,c.idconsultation,
                     p.nompat AS nom_patient, p.prenompat AS prenom_patient, p.localisation AS localisation_patient, p.telephonepat AS telephone_patient,
                     m.nomMed AS nom_medecin, m.prenomMed AS prenom_medecin
              FROM consultation c
              INNER JOIN dossier_patient p ON c.iddossier_patient = p.iddossier_patient
              INNER JOIN medecin m ON c.idmedecin = m.idmedecin
              WHERE c.idmedecin = :idMedecin
                    AND (p.nompat LIKE :search
                         OR p.telephonepat LIKE :search
                         OR CONCAT(m.nomMed, ' ', m.prenomMed) LIKE :search)";

    $stmt = $conn->prepare($query);
    $stmt->bindValue(':idMedecin', $idMedecin, PDO::PARAM_INT);
    $stmt->bindValue(':search', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $response = array(
        "success" => true,
        "data" => $results
    );
} catch (PDOException $e) {
    $response = array(
        "success" => false,
        "message" => $e->getMessage()
    );
}

echo(json_encode($response));
?>
