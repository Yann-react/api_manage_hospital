<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');

    try {
        $stmt = $conn->prepare("UPDATE traitement SET idActeMed = :idActeMed, idConsultation = :idConsultation, objetActe = :objetActe, observationActe = :observationActe WHERE <?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("SELECT * FROM traitement WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $id = $_GET["id"];
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
            $result = array(
                "success" => true,
                "data" => $result
            );
        } else {
            $result = array(
                "success" => false,
                "message" => "Aucun traitement trouvé avec cet ID"
            );
        }
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false
        );
    }
    echo(json_encode($result));
?>
 = :idTrait");
        $stmt->bindParam(':idActeMed', $idActeMed);
        $stmt->bindParam(':idConsultation', $idConsultation);
        $stmt->bindParam(':objetActe', $objetActe);
        $stmt->bindParam(':observationActe', $observationActe);
        $stmt->bindParam(':idTrait', $idTrait);

        $idActeMed = $_GET["idActeMed"];
        $idConsultation = $_GET["idConsultation"];
        $objetActe = $_GET["objetActe"];
        $observationActe = $_GET["observationActe"];
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
