<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("DELETE FROM examencomplement WHERE idExamenCompl = :idExamenCompl");
        $stmt->bindParam(':idExamenCompl', $idExamenCompl);
        $idExamenCompl = $_GET["idExamenCompl"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Examen supprimé avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la suppression de l'examen"
        );
    }
    echo(json_encode($result));
?>
