<?php
require_once "../conn.php";
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');

try {
  $stmt = $conn->prepare("SELECT iddossier_patient, nompat, prenompat FROM dossier_patient");
  $stmt->execute();

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($result);
} catch (PDOException $e) {
  echo $e->getMessage();
}
