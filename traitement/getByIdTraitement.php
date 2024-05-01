<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("SELECT * FROM traitement WHERE idTrait = :idTrait");
        $stmt->bindParam(':idTrait', $idTrait);
        $idTrait = $_GET["idTrait"];
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
