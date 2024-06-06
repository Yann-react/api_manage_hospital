<?php 
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("INSERT INTO resultatexamen (idConsultation,idExemanCompl,objet,interpretation,dateExamen,etats) VALUES (:idConsultation,:idExemanCompl,:objet,:interpretation,:dateExamen,:etats)");
        $stmt->bindParam(':idConsultation', $idConsultation);
        $stmt->bindParam(':idExemanCompl', $idExemanCompl);
        $stmt->bindParam(':objet', $objet);
        $stmt->bindParam(':interpretation', $interpretation);
        $stmt->bindParam(':dateExamen', $dateExamen);
        $stmt->bindParam(':etats', $daetatsteExamen);
      
        $idConsultation = $_GET["idConsultation"];
        $idExemanCompl = $_GET["idExemanCompl"];
        $objet = $_GET["objet"];
        $interpretation = $_GET["interpretation"];
        $dateExamen = $_GET["dateExamen"];
        $etats = $_GET["etats"];
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
