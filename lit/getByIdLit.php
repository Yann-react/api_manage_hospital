<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("SELECT * FROM lit WHERE numerolit = :numerolit");
        $stmt->bindParam(':numerolit', $numerolit);
        $numerolit = $_GET["numerolit"];
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
                "message" => "Aucun lit trouvé avec cet id"
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
