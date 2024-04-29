<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("DELETE FROM dossier_patient WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $id = $_GET["id"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Dossier patient supprimé avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la suppression du dossier patient"
        );
    }
    echo(json_encode($result));
?>
