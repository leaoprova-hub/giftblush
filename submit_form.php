<?php
// Данните за връзка с базата са в config.php (не се качва в GitHub).
// Копирай config.example.php като config.php и попълни своите данни.
require __DIR__ . "/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = trim($_POST["name"] ?? "");
    $email   = trim($_POST["email"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name !== "" && $email !== "" && $message !== "" && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)");
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":message", $message);
            $stmt->execute();

            header("Location: contacts.html?sent=1");
            exit();
        } catch (PDOException $e) {
            header("Location: contacts.html?error=1");
            exit();
        }
    } else {
        header("Location: contacts.html?error=2");
        exit();
    }
} else {
    header("Location: contacts.html?error=3");
    exit();
}
