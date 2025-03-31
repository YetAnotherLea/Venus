<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . "/../../config/database.php";

class RegisterModel extends Database
{

    public function verifyEmail($email) {
        $checkEmail = $this->db->prepare("SELECT COUNT(*) FROM `users` WHERE email = :email");
        $checkEmail->bindParam(':email', $email);
        $checkEmail->execute();

        return $checkEmail->fetchColumn();
    }

    public function verifyAge($date)
    {
        $dob = new DateTime($date);
        $now = new DateTime();

        if ($dob > $now) {
            return false;
        }

        $dob->add(new DateInterval('P18Y'));

        return $dob <= $now;
    }

    public function createUser()
    {
        try {
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $birthdate = $_POST['birthdate'];
            $genre = $_POST['genre'];
            $city = $_POST['city'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $hobby = $_POST['hobby'];

            //CHECK USER AGE
            if (!$this->verifyAge($birthdate)) {
                echo "Erreur d'âge.";
                return false;
            }

            //CHECK EMAIL VALIDITY
            if ($this->verifyEmail($email) == 1) {
                echo "Cet email est déjà utilisé";
                return false;
            }

            $createUsers = $this->db->prepare("
                INSERT INTO users(lastname, firstname, birthdate, genre, city, email, password, hobby)
                VALUES(:lastname, :firstname, :birthdate, :genre, :city, :email, :password, :hobby)");
            $createUsers->bindParam(':lastname', $lastname);
            $createUsers->bindParam(':firstname', $firstname);
            $createUsers->bindParam(':birthdate', $birthdate);
            $createUsers->bindParam(':genre', $genre);
            $createUsers->bindParam(':city', $city);
            $createUsers->bindParam(':email', $email);
            $createUsers->bindParam(':password', $password);
            $createUsers->bindParam(':hobby', $hobby);
            $createUsers->execute();

            header("Location:../login/loginView.php");
        } catch (PDOException $event) {
            echo 'Impossible de traiter les données. Erreur : ' . $event->getMessage();
        }
    }
}

$registerModel = new RegisterModel();
$callCreateUser = $registerModel->createUser();
