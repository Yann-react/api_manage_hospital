<?php 
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("INSERT INTO dossier_patient (nompat,prenompat,datenaisspat,lieunaisspat,localisation,telephonepat,emailpat,professionpat,antecedents) VALUES (:nompat,:prenompat,:datenaisspat,:lieunaisspat,:localisation,:telephonepat,:emailpat,:professionpat,:antecedents)");
        $stmt->bindParam(':nompat', $nompat);
        $stmt->bindParam(':prenompat', $prenompat);
        $stmt->bindParam(':datenaisspat', $datenaisspat);
        $stmt->bindParam(':lieunaisspat', $lieunaisspat);
        $stmt->bindParam(':localisation', $localisation);
        $stmt->bindParam(':telephonepat', $telephonepat);
        $stmt->bindParam(':emailpat', $emailpat);
        $stmt->bindParam(':professionpat', $professionpat);
        $stmt->bindParam(':antecedents', $antecedents);
        
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
