<?php 
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("INSERT INTO medecin (nomMed,prenomMed,telephoneMed,emailMed,cniMed,cpteBanque,gradeMed,specialiteMed) VALUES (:nomMed,:prenomMed,:telephoneMed,:emailMed,:cniMed,:cpteBanque,:gradeMed,:specialiteMed)");
        $stmt->bindParam(':nomMed', $nomMed);
        $stmt->bindParam(':prenomMed', $prenomMed);
        $stmt->bindParam(':telephoneMed', $telephoneMed);
        $stmt->bindParam(':emailMed', $emailMed);
        $stmt->bindParam(':cniMed', $cniMed);
        $stmt->bindParam(':cpteBanque', $cpteBanque);
        $stmt->bindParam(':gradeMed', $gradeMed);
        $stmt->bindParam(':specialiteMed', $specialiteMed);
        
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
            "success" => true
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
