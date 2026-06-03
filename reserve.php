<?php
include "db.php";

$nom = $_POST['nom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$date_voyage = $_POST['date_voyage'];
$passagers = $_POST['passagers'];

$sql = "INSERT INTO reservations 
(nom, email, telephone, date_voyage, passagers, paiement_status)
VALUES ('$nom', '$email', '$telephone', '$date_voyage', '$passagers', 'En attente')";

if ($conn->query($sql) === TRUE) {

    $reservation_id = $conn->insert_id;

    header("Location: paiement.php?id=".$reservation_id);
    exit();
}
 else {
    echo "Erreur : " . $conn->error;
}
?>
