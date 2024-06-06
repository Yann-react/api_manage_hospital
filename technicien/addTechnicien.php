<?php 
      require_once "../conn.php";
      header("Access-Control-Allow-Origin: http://localhost:3000");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    
    try{
        $stmt = $conn->prepare("INSERT INTO  technicien (nomTechn,prenomTechn,telephoneTechn,emailTechn,cni,cpteBanque,gradeTechn,specialiteTechn ,password) VALUES (:nomTechn,:prenomTechn,:telephoneTechn,:emailTechn,:cni,:cpteBanque,:gradeTechn,:specialiteTechn,:password)");
        $stmt->bindParam(':nomTechn', $nomTechn);
        $stmt->bindParam(':prenomTechn', $prenomTechn);
        $stmt->bindParam(':telephoneTechn', $telephoneTechn);
        $stmt->bindParam(':emailTechn', $emailTechn);
        $stmt->bindParam(':cni', $cni);
        $stmt->bindParam(':cpteBanque', $cpteBanque);
        $stmt->bindParam(':gradeTechn', $gradeTechn);
        $stmt->bindParam(':specialiteTechn', $specialiteTechn);
        $stmt->bindParam(':password', $password);
        
        $nomTechn = $_GET["nomTechn"];
        $prenomTechn = $_GET["prenomTechn"];
        $telephoneTechn = $_GET["telephoneTechn"];
        $emailTechn = $_GET["emailTechn"];
        $cni = $_GET["cni"];
        $cpteBanque = $_GET["cpteBanque"];
        $gradeTechn = $_GET["gradeTechn"];
        $specialiteTechn = $_GET["specialiteTechn"];
        $password = $_GET["password"];
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
