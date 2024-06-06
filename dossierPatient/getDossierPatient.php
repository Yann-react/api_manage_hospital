<?php
    require_once "../conn.php";
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type');

    $searchPatient = isset($_GET['searchPatient']) ? $_GET['searchPatient'] : '';
    $query = "SELECT * FROM dossier_patient WHERE 1=1";
    if (!empty($searchPatient)) {
        $query .= " AND (nompat LIKE :search OR prenompat LIKE :search OR emailpat LIKE :search OR telephonepat LIKE :search)";
    }

    try {
        $stmt = $conn->prepare($query);
        if (!empty($searchPatient)) {
            $search = '%' . $searchPatient . '%';
            $stmt->bindParam(':search', $search, PDO::PARAM_STR);
        }
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = array(
            "success" => true,
            "data" => $results
        );
    } catch (PDOException $e) {
        echo($e->getMessage());
        $result = array(
            "success" => false
        );
    }

    echo(json_encode($result));
?>
