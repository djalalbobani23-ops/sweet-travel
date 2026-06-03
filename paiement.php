<?php
include "db.php";

$message = "";

// Quand l'utilisateur clique sur "Payer"
if (isset($_POST['payer'])) {

    // Mettre à jour la dernière réservation (simulation)
    $reservation_id = $_GET['id'] ?? null;
    if (!$reservation_id) {
    die("Réservation introuvable.");
}


   $sql = "UPDATE reservations 
        SET paiement_status = 'Payé (simulation)'
        WHERE id = $reservation_id";


    if ($conn->query($sql) === TRUE) {
        $message = "✅ Paiement effectué avec succès. Votre réservation est confirmée.";
    } else {
        $message = "❌ Une erreur est survenue lors du paiement.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Paiement</title>

<style>
body{
    background:#0e2a47;
    font-family:Arial;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}
.box{
    background:white;
    padding:40px;
    border-radius:20px;
    width:380px;
    text-align:center;
}
button{
    background:#28a745;
    color:white;
    border:none;
    padding:14px;
    width:100%;
    border-radius:30px;
    cursor:pointer;
    font-size:16px;
}
.message{
    margin-top:20px;
    font-weight:bold;
    color:green;
}
</style>
</head>

<body>

<div class="box">
    <h2>Paiement du voyage</h2>
    <p>Montant à payer :</p>
    <h3>50 000 FCFA</h3>

    <form method="post">
        <button type="submit" name="payer">Payer</button>
    </form>

    <?php if($message!=""){ ?>
        <div class="message"><?php echo $message; ?></div>
    <?php } ?>
</div>

</body>
</html>
