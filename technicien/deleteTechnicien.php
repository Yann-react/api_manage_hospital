<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("DELETE FROM technicien WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $id = $_GET["id"];
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
