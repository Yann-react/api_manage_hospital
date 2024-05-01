<?php 
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("INSERT INTO resultatexamen (idConsultation,idExemanCompl,objet,interpretation,dateExamen) VALUES (:idConsultation,:idExemanCompl,:objet,:interpretation,:dateExamen)");
        $stmt->bindParam(':idConsultation', $idConsultation);
        $stmt->bindParam(':idExemanCompl', $idExemanCompl);
        $stmt->bindParam(':objet', $objet);
        $stmt->bindParam(':interpretation', $interpretation);
        $stmt->bindParam(':dateExamen', $dateExamen);
      
        $idConsultation = $_GET["idConsultation"];
        $idExemanCompl = $_GET["idExemanCompl"];
        $objet = $_GET["objet"];
        $dateExamen = $_GET["dateExamen"];
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
