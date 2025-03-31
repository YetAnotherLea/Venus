<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . "/../../config/database.php";
include_once __DIR__ . "/../../config/session.php";

class LoginModel extends Database {
    public function getUser() {
        try{
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            $getUser = $this->db->prepare("SELECT * FROM `users` WHERE `email` LIKE :email");
            $getUser->bindParam(':email',$email);
            $getUser->execute();
            $userData = $getUser->fetch(PDO::FETCH_ASSOC);

            if($userData && password_verify($password, $userData['password'])) {
                $_SESSION['id'] = $userData['id'];
                $_SESSION['lastname'] = $userData['lastname'];
                $_SESSION['birthdate'] = $userData['birthdate'];
                $_SESSION['email'] = $userData['email'];
                $_SESSION['city'] = $userData['city'];
                $_SESSION['firstname'] = $userData['firstname'];
                $_SESSION['genre'] = $userData['genre'];
                $_SESSION['password'] = $userData['password'];
                $_SESSION['hobby'] = $userData['hobby'];
                $_SESSION['is_deleted'] = $userData['is_deleted'];
                
                if($userData['is_deleted'] == 1) {
                    echo "Ce compte a été supprimé.";
                    return false;
                }

                header("Location:../homepage.php");
                exit;
            } else {
                echo "Indentifiants incorrects. Réessayez.";
            }
        }
        catch(PDOException $event){
            echo 'Impossible de traiter les données. Erreur : '.$event->getMessage();
        }
    }
}

$loginModel = new LoginModel();
$callGetUser = $loginModel->getUser();

