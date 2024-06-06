<?php
  require_once "../conn.php";
  header("Access-Control-Allow-Origin: http://localhost:3000");
  header("Access-Control-Allow-Credentials: true");
  header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
  header("Access-Control-Allow-Headers: Content-Type, Authorization");
  
    try{
        $stmt = $conn->prepare("UPDATE dossier_patient SET nompat = :nompat, prenompat = :prenompat, datenaisspat = :datenaisspat, lieunaisspat = :lieunaisspat, localisation = :localisation, telephonepat = :telephonepat, emailpat = :emailpat, professionpat = :professionpat, antecedents = :antecedents WHERE iddossier_patient = :iddossier_patient");
        $stmt->bindParam(':iddossier_patient', $iddossier_patient);
        $stmt->bindParam(':nompat', $nompat);
        $stmt->bindParam(':prenompat', $prenompat);
        $stmt->bindParam(':datenaisspat', $datenaisspat);
        $stmt->bindParam(':lieunaisspat', $lieunaisspat);
        $stmt->bindParam(':localisation', $localisation);
        $stmt->bindParam(':telephonepat', $telephonepat);
        $stmt->bindParam(':emailpat', $emailpat);
        $stmt->bindParam(':professionpat', $professionpat);
        $stmt->bindParam(':antecedents', $antecedents);
        $iddossier_patient = $_GET["iddossier_patient"];
        $nompat = $_GET["nompat"];
        $prenompat = $_GET["prenompat"];
        $datenaisspat = $_GET["datenaisspat"];
        $lieunaisspat = $_GET["lieunaisspat"];
        $localisation = $_GET["localisation"];
        $telephonepat = $_GET["telephonepat"];
        $emailpat = $_GET["emailpat"];
        $professionpat = $_GET["professionpat"];
        $antecedents = $_GET["antecedents"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Dossier patient mis à jour avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la mise à jour du dossier patient"
        );
    }
    echo(json_encode($result));
?>
