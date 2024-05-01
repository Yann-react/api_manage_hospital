<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("UPDATE actemedical SET libeActeMedi = :libeActeMedi WHERE idActeMedi = :idActeMedi");
        $stmt->bindParam(':idActeMedi', $idActeMedi);
        $stmt->bindParam(':libeActeMedi', $libeActeMedi);
        $idActeMedi = $_GET["idActeMedi"];
        $libeActeMedi = $_GET["libeActeMedi"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Acte médical mis à jour avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la mise à jour de l'acte médical"
        );
    }
    echo(json_encode($result));
?>
