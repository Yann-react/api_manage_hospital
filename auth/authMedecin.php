<?php
require_once "../conn.php";
header("Access-Control-Allow-Origin: http://localhost:3000"); // Remplacez par le domaine et le port de votre application React
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

try {
    $stmt = $conn->prepare("SELECT * FROM medecin WHERE emailMed = :emailMed AND password = :password");
    $stmt->bindParam(':emailMed', $email);
    $stmt->bindParam(':password', $password);

    $email = $_GET["emailMed"];
    $password = $_GET["password"];
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = array(
            "success" => true,
            "id_medecin" => $row["idmedecin"]
        );
    } else {
        $result = array(
            "success" => false,
            "message" => "Email ou mot de passe incorrect"
        );
    }
} catch (PDOException $e) {
    echo($e->getMessage());
    $result = array(
        "success" => false,
        "message" => "Erreur de connexion à la base de données"
    );
}

echo(json_encode($result));
?>
