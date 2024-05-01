<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("UPDATE examencomplement SET libeExamen = :libeExamen WHERE idExamenCompl = :idExamenCompl");
        $stmt->bindParam(':idExamenCompl', $idExamenCompl);
        $stmt->bindParam(':libeExamen', $libeExamen);
        $idExamenCompl = $_GET["idExamenCompl"];
        $libeExamen = $_GET["libeExamen"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Examen mis à jour avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la mise à jour de l'examen"
        );
    }
    echo(json_encode($result));
?>
