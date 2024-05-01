<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("DELETE FROM actemedical WHERE idActeMedi = :idActeMedi");
        $stmt->bindParam(':idActeMedi', $idActeMedi);
        $idActeMedi = $_GET["idActeMedi"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Acte médical supprimé avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la suppression de l'acte médical"
        );
    }
    echo(json_encode($result));
?>
