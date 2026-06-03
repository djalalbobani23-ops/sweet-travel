<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom     = htmlspecialchars($_POST["nom"]);
    $prenom  = htmlspecialchars($_POST["prenom"]);
    $email   = htmlspecialchars($_POST["email"]);
    $phone   = htmlspecialchars($_POST["phone"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (nom, prenom, email, phone, password)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nom, $prenom, $email, $phone, $password);

    if ($stmt->execute()) {
        header("Location: home.html");
        exit();
    } else {
        echo "Erreur : email ou numéro déjà utilisé";
    }
}
?>
