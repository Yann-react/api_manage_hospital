<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: http://localhost:3000");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    
    try{
        $stmt = $conn->prepare("UPDATE resultatexamen SET idConsultation = :idConsultation, idExemanCompl = :idExemanCompl, objet = :objet, interpretation = :interpretation, dateExamen = :dateExamen, etats = :etats WHERE idResultat = :idResultat");
        $stmt->bindParam(':idResultat', $idResultat);
        $stmt->bindParam(':idConsultation', $idConsultation);
        $stmt->bindParam(':idExemanCompl', $idExemanCompl);
        $stmt->bindParam(':objet', $objet);
        $stmt->bindParam(':interpretation', $interpretation);
        $stmt->bindParam(':dateExamen', $dateExamen);
        $stmt->bindParam(':etats', $etats);
        $idResultat = $_GET["idResultat"];
        $idConsultation = $_GET["idConsultation"];
        $idExemanCompl = $_GET["idExemanCompl"];
        $objet = $_GET["objet"];
        $interpretation = $_GET["interpretation"];
        $dateExamen = $_GET["dateExamen"];
        $etats = $_GET["etats"];
        $stmt->execute();
        $result = array(
            "success" => true,
            "message" => "Résultat d'examen mis à jour avec succès"
        );
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false,
            "message" => "Erreur lors de la mise à jour du résultat d'examen"
        );
    }
    echo(json_encode($result));
?>
