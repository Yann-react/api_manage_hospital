<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("DELETE FROM medecin WHERE idmedecin = :idmedecin");
        $stmt->bindParam(':idmedecin', $idmedecin);
        $idmedecin = $_GET["idmedecin"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Médecin supprimé avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la suppression du médecin"
        );
    }
    echo(json_encode($result));
?>
