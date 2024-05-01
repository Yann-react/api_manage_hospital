<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("UPDATE chambre SET numeroChambre = :numeroChambre, descriptionChambre = :descriptionChambre WHERE numeroChambre = :numeroChambre");
        $stmt->bindParam(':numeroChambre', $numeroChambre);
        $stmt->bindParam(':numeroChambre', $numeroChambre);
        $stmt->bindParam(':descriptionChambre', $descriptionChambre);
        $numeroChambre = $_GET["numeroChambre"];
        $numeroChambre = $_GET["numeroChambre"];
        $descriptionChambre = $_GET["descriptionChambre"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Chambre mise à jour avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la mise à jour de la chambre"
        );
    }
    echo(json_encode($result));
?>
