<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');

    // Récupération des valeurs envoyées depuis le formulaire de recherche
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    try {
        // Préparation de la requête SQL avec des paramètres
        $stmt = $conn->prepare("SELECT * FROM medecin WHERE nomMed LIKE :nom OR prenomMed LIKE :prenom OR telephoneMed LIKE :telephone OR emailMed LIKE :email");

        // Association des valeurs aux paramètres
        $stmt->bindValue(':nom', '%'.$search.'%', PDO::PARAM_STR);
        $stmt->bindValue(':prenom', '%'.$search.'%', PDO::PARAM_STR);
        $stmt->bindValue(':telephone', '%'.$search.'%', PDO::PARAM_STR);
        $stmt->bindValue(':email', '%'.$search.'%', PDO::PARAM_STR);

        // Exécution de la requête
        $stmt->execute();

        // Récupération des résultats
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Retour des résultats au format JSON
        $result = array(
            "success" => true,
            "data" => $results
        );
        echo json_encode($result);
    }
    catch(PDOException $e){
        echo($e->getMessage());
        $result = array(
            "success" => false
        );
        echo json_encode($result);
    }
?>
