<?php
require_once "client.php";

class ClientController {

    private $conn;

    public function __construct() {
        $this->conn = new PDO("mysql:host=localhost;dbname=projet boutique", "root", "");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function inscrire() {

        $message = "";

        if(isset($_POST['inscrire'])) {

            $nom = trim($_POST['nom']);
            $email = trim($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if(empty($nom) || empty($email) || empty($_POST['password'])) {
                return "Remplis les champs ❌";
            }

            // 🔍 check email
            $check = $this->conn->prepare("SELECT * FROM clients WHERE emailc = ?");
            $check->execute([$email]);

            if($check->rowCount() > 0) {
                return "Email déjà موجود ❌";
            }

            // 🟣 استعمال Model
            $client = new Client($nom, $email, $password);

            // insert
            $stmt = $this->conn->prepare("INSERT INTO clients(nomc,emailc,passwordc) VALUES (?,?,?)");
            $stmt->execute([
                $client->getNom(),
                $client->getEmail(),
                $client->getPassword()
            ]);

            return "Compte créé ✔️";
        }

        return $message;
    }
}