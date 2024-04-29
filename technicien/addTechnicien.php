<?php 
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("INSERT INTO  technicien (nomTechn,prenomTechn,telephoneTechn,emailTechn,cni,cpteBanque,gradeTechn,specialiteTechn) VALUES (:nomTechn,:prenomTechn,:telephoneTechn,:emailTechn,:cni,:cpteBanque,:gradeTechn,:specialiteTechn)");
        $stmt->bindParam(':nomTechn', $nomTechn);
        $stmt->bindParam(':prenomTechn', $prenomTechn);
        $stmt->bindParam(':telephoneTechn', $telephoneTechn);
        $stmt->bindParam(':emailTechn', $emailTechn);
        $stmt->bindParam(':cni', $cni);
        $stmt->bindParam(':cpteBanque', $cpteBanque);
        $stmt->bindParam(':gradeTechn', $gradeTechn);
        $stmt->bindParam(':specialiteTechn', $specialiteTechn);
        
        $nomTechn = $_GET["nomTechn"];
        $prenomTechn = $_GET["prenomTechn"];
        $telephoneTechn = $_GET["telephoneTechn"];
        $emailTechn = $_GET["emailTechn"];
        $cni = $_GET["cni"];
        $cpteBanque = $_GET["cpteBanque"];
        $gradeTechn = $_GET["gradeTechn"];
        $specialiteTechn = $_GET["specialiteTechn"];
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
