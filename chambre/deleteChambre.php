<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("DELETE FROM chambre WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $id = $_GET["id"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Chambre supprimée avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la suppression de la chambre"
        );
    }
    echo(json_encode($result));
?>
