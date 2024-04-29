<?php 
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("INSERT INTO actemedical (libeActeMedi) VALUES (:libeActeMedi)");
        $stmt->bindParam(':libeActeMedi', $libeActeMedi);
        
        $libeActeMedi = $_GET["libeActeMedi"];
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
