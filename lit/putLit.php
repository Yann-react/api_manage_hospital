<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("UPDATE lit SET numerolit = :numerolit, descriptionLit = :descriptionLit, numerochambre = :numerochambre WHERE numerolit = :numerolit");
        $stmt->bindParam(':numerolit', $numerolit);
        $stmt->bindParam(':descriptionLit', $descriptionLit);
        $stmt->bindParam(':numerochambre', $numerochambre);
        $numerolit = $_GET["numerolit"];
        $descriptionLit = $_GET["descriptionLit"];
        $numerochambre = $_GET["numerochambre"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Lit mis à jour avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la mise à jour du lit"
        );
    }
    echo(json_encode($result));
?>
