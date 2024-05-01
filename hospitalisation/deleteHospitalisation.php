<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("DELETE FROM hospitalisation WHERE idHosp = :idHosp");
        $stmt->bindParam(':idHosp', $idHosp);
        $idHosp = $_GET["idHosp"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Hospitalisation supprimée avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la suppression de l'hospitalisation"
        );
    }
    echo(json_encode($result));
?>
