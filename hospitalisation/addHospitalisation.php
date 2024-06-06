<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');

    $idLit = $_GET["idLit"];
    $idConsultation = $_GET["idConsultation"];
    $dateDebut = $_GET["dateDebut"];
    $dateFin = $_GET["dateFin"];

    try{
        // Vérification si le lit est déjà occupé
        $stmt_verify = $conn->prepare("SELECT * FROM hospitalisation WHERE idLit = :idLit AND (:dateDebut BETWEEN dateDebut AND dateFin OR :dateFin BETWEEN dateDebut AND dateFin)");
        $stmt_verify->bindParam(':idLit', $idLit);
        $stmt_verify->bindParam(':dateDebut', $dateDebut);
        $stmt_verify->bindParam(':dateFin', $dateFin);
        $stmt_verify->execute();

        if($stmt_verify->rowCount() > 0){
            // Le lit est déjà occupé
            $result = array(
                "success" => false,
                "message" => "Le lit est déjà occupé"
            );
        } else {
            // Le lit est disponible, on peut insérer les données
            $stmt = $conn->prepare("INSERT INTO hospitalisation (idLit,idConsultation,dateDebut,dateFin) VALUES (:idLit,:idConsultation,:dateDebut,:dateFin)");
            $stmt->bindParam(':idLit', $idLit);
            $stmt->bindParam(':idConsultation', $idConsultation);
            $stmt->bindParam(':dateDebut', $dateDebut);
            $stmt->bindParam(':dateFin', $dateFin);
            $stmt->execute();

            $result = array(
                "success" => true
            );
        }

    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false
        );
    }

    echo(json_encode($result));
?>
