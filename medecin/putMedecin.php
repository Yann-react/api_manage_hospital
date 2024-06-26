<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: http://localhost:3000");
  header("Access-Control-Allow-Credentials: true");
  header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
  header("Access-Control-Allow-Headers: Content-Type, Authorization");
  
    try{
        $stmt = $conn->prepare("UPDATE medecin SET nomMed = :nomMed, prenomMed = :prenomMed, telephoneMed = :telephoneMed, emailMed = :emailMed, cniMed = :cniMed, cpteBanque = :cpteBanque, gradeMed = :gradeMed, specialiteMed = :specialiteMed WHERE idmedecin = :idmedecin");
        $stmt->bindParam(':idmedecin', $idmedecin);
        $stmt->bindParam(':nomMed', $nomMed);
        $stmt->bindParam(':prenomMed', $prenomMed);
        $stmt->bindParam(':telephoneMed', $telephoneMed);
        $stmt->bindParam(':emailMed', $emailMed);
        $stmt->bindParam(':cniMed', $cniMed);
        $stmt->bindParam(':cpteBanque', $cpteBanque);
        $stmt->bindParam(':gradeMed', $gradeMed);
        $stmt->bindParam(':specialiteMed', $specialiteMed);
        $idmedecin = $_GET["idmedecin"];
        $nomMed = $_GET["nomMed"];
        $prenomMed = $_GET["prenomMed"];
        $telephoneMed = $_GET["telephoneMed"];
        $emailMed = $_GET["emailMed"];
        $cniMed = $_GET["cniMed"];
        $cpteBanque = $_GET["cpteBanque"];
        $gradeMed = $_GET["gradeMed"];
        $specialiteMed = $_GET["specialiteMed"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Médecin mis à jour avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la mise à jour du médecin"
        );
    }
    echo(json_encode($result));
?>
