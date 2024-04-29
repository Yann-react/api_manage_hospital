<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("UPDATE technicien SET nomTechn = :nomTechn, prenomTechn = :prenomTechn, telephoneTechn = :telephoneTechn, emailTechn = :emailTechn, cni = :cni, cpteBanque = :cpteBanque, gradeTechn = :gradeTechn, specialiteTechn = :specialiteTechn WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nomTechn', $nomTechn);
        $stmt->bindParam(':prenomTechn', $prenomTechn);
        $stmt->bindParam(':telephoneTechn', $telephoneTechn);
        $stmt->bindParam(':emailTechn', $emailTechn);
        $stmt->bindParam(':cni', $cni);
        $stmt->bindParam(':cpteBanque', $cpteBanque);
        $stmt->bindParam(':gradeTechn', $gradeTechn);
        $stmt->bindParam(':specialiteTechn', $specialiteTechn);
        $id = $_GET["id"];
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
            "message" => "Technicien mis à jour avec succès"
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
