<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("DELETE FROM consultation WHERE idconsultation = :idconsultation");
        $stmt->bindParam(':idconsultation', $idconsultation);
        $idconsultation = $_GET["idconsultation"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Consultation supprimée avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la suppression de la consultation"
        );
    }
    echo(json_encode($result));
?>
