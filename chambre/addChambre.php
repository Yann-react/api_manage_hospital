<?php 
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("INSERT INTO chambre (numeroChambre,descriptionChambre) VALUES (:numeroChambre,:descriptionChambre)");
        $stmt->bindParam(':numeroChambre', $numeroChambre);
        $stmt->bindParam(':descriptionChambre', $descriptionChambre);
        
        $numeroChambre = $_GET["numeroChambre"];
        $descriptionChambre = $_GET["descriptionChambre"];
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
