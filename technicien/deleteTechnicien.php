<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("DELETE FROM technicien WHERE idTechnicien = :idTechnicien");
        $stmt->bindParam(':idTechnicien', $idTechnicien);
        $idTechnicien = $_GET["idTechnicien"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Technicien supprimé avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la suppression du technicien"
        );
    }
    echo(json_encode($result));
?>
