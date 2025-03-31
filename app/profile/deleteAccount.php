<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . "/../../config/database.php";
include_once __DIR__ . "/../../config/session.php";

class DeleteAccount extends Database {
    public function deleteAccount() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            try {
                $userId = $_SESSION['id'];
                $is_deleted = $_SESSION['is_deleted'];

                if ($is_deleted == 0) {
                    $active = $this->db->prepare("UPDATE `users` SET `is_deleted`= 1 WHERE `id`= :id");
                    $active->bindParam(':id', $userId);
                    $active->execute();
                }

                session_unset();
                session_destroy();
                header("Location:./login/loginView.php");
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

$deleteAcount = new DeleteAccount();
$callDeleteAccount = $deleteAcount->deleteAccount();
