<?php 
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("INSERT INTO traitement (idActeMed,idConsultation,objetActe,observationActe) VALUES (:idActeMed,:idConsultation,:objetActe,:observationActe)");
        $stmt->bindParam(':idActeMed', $idActeMed);
        $stmt->bindParam(':idConsultation', $idConsultation);
        $stmt->bindParam(':objetActe', $objetActe);
        $stmt->bindParam(':observationActe', $observationActe);
      
        $idActeMed = $_GET["idActeMed"];
        $idConsultation = $_GET["idConsultation"];
        $objetActe = $_GET["objetActe"];
        $observationActe = $_GET["observationActe"];
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
