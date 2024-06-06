<?php
require_once "../conn.php";
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$period = $_GET["period"];

try {
    // Nombre total de patients
    $stmt = $conn->query("SELECT COUNT(iddossier_patient) AS nombre_patients FROM dossier_patient");
    $resultat = $stmt->fetch();
    $nombre_patients = $resultat["nombre_patients"];

    // Nombre total d'actes médicaux
    $stmt = $conn->query("SELECT COUNT(idActeMedi) AS nombre_actes_medicaux FROM actemedical");
    $resultat = $stmt->fetch();
    $nombre_actes_medicaux = $resultat["nombre_actes_medicaux"];

    // Nombre de consultations
    if ($period === "jour") {
        $stmt = $conn->query("SELECT COUNT(idconsultation) AS nombre_consultations FROM consultation WHERE DATE(dateconsult) = CURDATE()");
    } elseif ($period === "semaine") {
        $stmt = $conn->query("SELECT COUNT(idconsultation) AS nombre_consultations FROM consultation WHERE WEEK(dateconsult) = WEEK(CURDATE())");
    } elseif ($period === "mois") {
        $stmt = $conn->query("SELECT COUNT(idconsultation) AS nombre_consultations FROM consultation WHERE MONTH(dateconsult) = MONTH(CURDATE())");
    } else {
        $result = array(
            "success" => false,
            "message" => "Période invalide"
        );
        echo json_encode($result);
        exit();
    }
    $resultat = $stmt->fetch();
    $nombre_consultations = $resultat["nombre_consultations"];

    // Nombre d'examens
    if ($period === "jour") {
        $stmt = $conn->query("SELECT COUNT(idResultat) AS nombre_examens FROM resultatexamen WHERE DATE(dateExamen) = CURDATE()");
    } elseif ($period === "semaine") {
        $stmt = $conn->query("SELECT COUNT(idResultat) AS nombre_examens FROM resultatexamen WHERE WEEK(dateExamen) = WEEK(CURDATE())");
    } elseif ($period === "mois") {
        $stmt = $conn->query("SELECT COUNT(idResultat) AS nombre_examens FROM resultatexamen WHERE MONTH(dateExamen) = MONTH(CURDATE())");
    } else {
        $result = array(
            "success" => false,
            "message" => "Période invalide"
        );
        echo json_encode($result);
        exit();
    }
    $resultat = $stmt->fetch();
    $nombre_examens = $resultat["nombre_examens"];

    $result = array(
        "success" => true,
        "message" => "Données récupérées avec succès",
        "data" => array(
            "nombre_patients" => $nombre_patients,
            "nombre_actes_medicaux" => $nombre_actes_medicaux,
            "nombre_consultations" => $nombre_consultations,
            "nombre_examens" => $nombre_examens
        )
    );
} catch (PDOException $e) {
    $result = array(
        "success" => false,
        "message" => "Erreur lors de la récupération des données : " . $e->getMessage()
    );
}

echo json_encode($result);
