<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("DELETE FROM resultatexamen WHERE idResultat = :idResultat");
        $stmt->bindParam(':idResultat', $idResultat);
        $idResultat = $_GET["idResultat"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Résultat d'examen supprimé avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la suppression du résultat d'examen"
        );
    }
    echo(json_encode($result));
?>
