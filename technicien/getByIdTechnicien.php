<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("SELECT * FROM technicien WHERE idTechnicien = :idTechnicien");
        $stmt->bindParam(':idTechnicien', $idTechnicien);
        $idTechnicien = $_GET["idTechnicien"];
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
                "message" => "Aucun technicien trouvé avec cet id"
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
