<?php 
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("INSERT INTO lit (numerolit,descriptionLit,numerochambre) VALUES (:numerolit,:descriptionLit,:numerochambre)");
        $stmt->bindParam(':numerolit', $numerolit);
        $stmt->bindParam(':descriptionLit', $descriptionLit);
        $stmt->bindParam(':numerochambre', $numerochambre);
        
        $numerolit = $_GET["numerolit"];
        $descriptionLit = $_GET["descriptionLit"];
        $numerochambre = $_GET["numerochambre"];
        $stmt->execute();

        $result = array(
            "success" => true
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
