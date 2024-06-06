<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: http://localhost:3000");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    try{
        $stmt = $conn->prepare("UPDATE technicien SET nomTechn = :nomTechn, prenomTechn = :prenomTechn, telephoneTechn = :telephoneTechn, emailTechn = :emailTechn, cni = :cni, cpteBanque = :cpteBanque, gradeTechn = :gradeTechn, specialiteTechn = :specialiteTechn WHERE idTechnicien = :idTechnicien");
        $stmt->bindParam(':idTechnicien', $idTechnicien);
        $stmt->bindParam(':nomTechn', $nomTechn);
        $stmt->bindParam(':prenomTechn', $prenomTechn);
        $stmt->bindParam(':telephoneTechn', $telephoneTechn);
        $stmt->bindParam(':emailTechn', $emailTechn);
        $stmt->bindParam(':cni', $cni);
        $stmt->bindParam(':cpteBanque', $cpteBanque);
        $stmt->bindParam(':gradeTechn', $gradeTechn);
        $stmt->bindParam(':specialiteTechn', $specialiteTechn);
        $idTechnicien = $_GET["idTechnicien"];
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
            "success" => true,
            "message" => "Technicien mis à <jo></jo>ur avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la mise à jour du technicien"
        );
    }
    echo(json_encode($result));
?>
