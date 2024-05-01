<?php 
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("INSERT INTO hospitalisation (idLit,idConsultation,dateDebut,dateFin) VALUES (:idLit,:idConsultation,:dateDebut,:dateFin)");
        $stmt->bindParam(':idLit', $idLit);
        $stmt->bindParam(':idConsultation', $idConsultation);
        $stmt->bindParam(':dateDebut', $dateDebut);
        $stmt->bindParam(':dateFin', $dateFin);
      
        $idLit = $_GET["idLit"];
        $idConsultation = $_GET["idConsultation"];
        $dateDebut = $_GET["dateDebut"];
        $dateFin = $_GET["dateFin"];
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
