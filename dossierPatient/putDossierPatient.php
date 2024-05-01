<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("UPDATE dossier_patient SET nompat = :nompat, prenompat = :prenompat, datenaisspat = :datenaisspat, lieunaisspat = :lieunaisspat, localisation = :localisation, telephonepat = :telephonepat, emailpat = :emailpat, professionpa = :professionpa, antecedents = :antecedents WHERE iddossier_patient = :iddossier_patient");
        $stmt->bindParam(':iddossier_patient', $iddossier_patient);
        $stmt->bindParam(':nompat', $nompat);
        $stmt->bindParam(':prenompat', $prenompat);
        $stmt->bindParam(':datenaisspat', $datenaisspat);
        $stmt->bindParam(':lieunaisspat', $lieunaisspat);
        $stmt->bindParam(':localisation', $localisation);
        $stmt->bindParam(':telephonepat', $telephonepat);
        $stmt->bindParam(':emailpat', $emailpat);
        $stmt->bindParam(':professionpa', $professionpa);
        $stmt->bindParam(':antecedents', $antecedents);
        $iddossier_patient = $_GET["iddossier_patient"];
        $nompat = $_GET["nompat"];
        $prenompat = $_GET["prenompat"];
        $datenaisspat = $_GET["datenaisspat"];
        $lieunaisspat = $_GET["lieunaisspat"];
        $localisation = $_GET["localisation"];
        $telephonepat = $_GET["telephonepat"];
        $emailpat = $_GET["emailpat"];
        $professionpa = $_GET["professionpa"];
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
