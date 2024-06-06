<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("INSERT INTO examencomplement (libeExamen) VALUES (:libeExamen)");
        $stmt->bindParam(':libeExamen', $libeExamen);

        $libeExamen = $_GET["libeExamen"];
        $stmt->execute();

        $examenId = $conn->lastInsertId();

        $result = array(
            "success" => true,
            "id" => $examenId
        );

    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false
        );
    }

    echo(json_encode($result));
?>
