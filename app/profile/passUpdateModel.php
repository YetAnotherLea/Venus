<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . "/../../config/database.php";
include_once __DIR__ . "/../../config/session.php";

class PasswordModel extends Database
{
    public function passwordData()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            try {
                $userId = $_SESSION['id'];
                $password = $_POST['password'];
                $new_pw = $_POST['new_pw'];
                $new_pw_hashed = password_hash($new_pw, PASSWORD_DEFAULT);

                $db_check = $this->db->prepare("SELECT `password` FROM `users` WHERE `id` = :id");
                $db_check->bindParam(':id', $userId);
                $db_check->execute();
                $user = $db_check->fetch(PDO::FETCH_ASSOC);

                if (!password_verify($password, $user['password'])) {
                    echo "Votre mot de passe actuel est incorrect.";
                    return false;
                }

                if ($new_pw == $password) {
                    echo "Veuillez choisir un mot de passe différent.";
                    return false;
                }

                $replace_pw = $this->db->prepare("UPDATE `users` SET `password`= :password WHERE `id`= :id");
                $replace_pw->bindParam(':password', $new_pw_hashed);
                $replace_pw->bindParam(':id', $userId);
                $replace_pw->execute();

                header('Location:./profileView.php');
                exit;
            } catch (PDOException $event) {
                echo 'Impossible de traiter les données. Erreur : ' . $event->getMessage();
            }
        } else {
            echo "Erreur de méthode. Vérifier si la méthode est bien 'POST'.";
            exit;
        }
    }
}

$passwordModel = new PasswordModel();
$callPasswordData = $passwordModel->passwordData();
