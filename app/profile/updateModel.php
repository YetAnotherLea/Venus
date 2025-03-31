<?php
//Vérifier format valide (pas SQL)
//TODO: AJOUTER DES TRIMS (ex: $newUsername = trim($_POST['username']);)

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . "/../../config/database.php";
include_once __DIR__ . "/../../config/session.php";

class UpdateModel extends Database
{

    public function userAge($date)
    {
        $dob = new DateTime($date);
        $now = new DateTime();

        if ($dob > $now) {
            return false;
        }

        $dob->add(new DateInterval('P18Y'));

        return $dob <= $now;
    }


    public function updateData()
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            try {
                //FORM INPUTS
                $userId = $_SESSION['id'];
                $newLastname = $_POST['lastname'] ?? $_SESSION['lastname'];
                $newFirstname = $_POST['firstname'] ?? $_SESSION['firstname'];
                $newEmail = $_POST['email'] ?? $_SESSION['email'];
                $newBirthdate = $_POST['birthdate'] ?? $_SESSION['birthdate'];
                $newGenre = $_POST['genre'] ?? $_SESSION['genre'];
                $newCity = $_POST['city'] ?? $_SESSION['city'];
                $newHobby = $_POST['hobby'] ?? $_SESSION['hobby'];

                //CHECK USER AGE
                if (!$this->userAge($newBirthdate)) {
                    echo "Erreur d'âge.";
                    return false;
                }

                //UPDATE DATA
                $updateUser = $this->db->prepare("UPDATE `users`
                SET `lastname` = :lastname,
                `firstname` = :firstname,
                `email` = :email,
                `birthdate` = :birthdate,
                `genre` = :genre,
                `city` = :city,
                `hobby` = :hobby
                WHERE `id` LIKE :id");
                $updateUser->bindParam(':id', $userId);
                $updateUser->bindParam(':lastname', $newLastname);
                $updateUser->bindParam(':firstname', $newFirstname);
                $updateUser->bindParam(':email', $newEmail);
                $updateUser->bindParam(':birthdate', $newBirthdate);
                $updateUser->bindParam(':genre', $newGenre);
                $updateUser->bindParam(':city', $newCity);
                $updateUser->bindParam(':hobby', $newHobby);
                $updateUser->execute();

                //UPDATE SESSION
                $_SESSION['lastname'] = $newLastname;
                $_SESSION['firstname'] = $newFirstname;
                $_SESSION['email'] = $newEmail;
                $_SESSION['birthdate'] = $newBirthdate;
                $_SESSION['genre'] = $newGenre;
                $_SESSION['city'] = $newCity;
                $_SESSION['hobby'] = $newHobby;


                //REDIRECT
                header('Location:./profileView.php');
            } catch (PDOException $event) {
                echo 'Impossible de traiter les données. Erreur : ' . $event->getMessage();
            }
        } else {
            echo "Erreur de méthode. Vérifier si la méthode est bien 'POST'.";
            exit;
        }
    }
}

$updateModel = new UpdateModel();
$callUpdateData = $updateModel->updateData();
