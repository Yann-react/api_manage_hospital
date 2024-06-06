<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("INSERT INTO accouchement (dateAccouchement, descriptionAccouchement, idTechnicien, idConsultation) VALUES (COALESCE(:dateAccouchement, NULL), COALESCE(:descriptionAccouchement, NULL), :idTechnicien, :idConsultation)");
        $stmt->bindParam(':dateAccouchement', $dateAccouchement);
        $stmt->bindParam(':descriptionAccouchement', $descriptionAccouchement);
        $stmt->bindParam(':idTechnicien', $idTechnicien);
        $stmt->bindParam(':idConsultation', $idConsultation);

        $dateAccouchement = isset($_GET["dateAccouchement"]) ? $_GET["dateAccouchement"] : null;
        $descriptionAccouchement = isset($_GET["descriptionAccouchement"]) ? $_GET["descriptionAccouchement"] : null;
        $idTechnicien = $_GET["idTechnicien"];
        $idConsultation = $_GET["idConsultation"];
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
