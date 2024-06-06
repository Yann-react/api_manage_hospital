<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');
    try{
        $stmt = $conn->prepare("SELECT idTechnicien, nomTechn, prenomTechn FROM technicien WHERE specialiteTechn IN ('infirmier', 'sage-femme')");
        $stmt->execute();

        $result = array(
            "success" => true,
            "data" => $stmt->fetchAll(PDO::FETCH_ASSOC)
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
