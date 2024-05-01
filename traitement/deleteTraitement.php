<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');

    try {
        $stmt = $conn->prepare("DELETE FROM traitement WHERE idTrait = :idTrait");
        $stmt->bindParam(':idTrait', $idTrait);

        $idTrait = $_GET["idTrait"];
        $stmt->execute();

        $result = array(
            "success" => true
        );
    } catch(PDOException $e) {
        echo($e->getMessage());
        $result = array(
            "success" => false
        );
    }

    echo(json_encode($result));
?>
