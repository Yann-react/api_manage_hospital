<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("DELETE FROM accouchement WHERE idAccouchement = :idAccouchement");
        $stmt->bindParam(':idAccouchement', $idAccouchement);
        $idAccouchement = $_GET["idAccouchement"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Accouchement supprimé avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la suppression de l'accouchement"
        );
    }
    echo(json_encode($result));
?>