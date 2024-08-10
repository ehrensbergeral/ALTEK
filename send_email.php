<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Daten aus dem Formular erfassen
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // E-Mail-Einstellungen
    $to = "info@smartkiosk.com"; // Ersetzen Sie dies mit Ihrer E-Mail-Adresse
    $subject = "Kontaktformular Nachricht von $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Nachricht erstellen
    $email_body = "Name: $name\n";
    $email_body .= "E-Mail: $email\n\n";
    $email_body .= "Nachricht:\n$message\n";

    // E-Mail senden
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Vielen Dank für Ihre Nachricht. Wir werden uns so schnell wie möglich bei Ihnen melden.";
    } else {
        echo "Es gab ein Problem beim Senden Ihrer Nachricht. Bitte versuchen Sie es später erneut.";
    }
}
?>
