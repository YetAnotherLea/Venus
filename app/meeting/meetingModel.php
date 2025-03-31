<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . "/../../config/database.php";
include_once __DIR__ . "/../../config/session.php";

class MeetingModel extends Database {

    public function getAllData() {
        $selectData = $this->db->prepare("SELECT * FROM `user_horoscope`;");
        $selectData->setFetchMode(PDO::FETCH_ASSOC);
        $selectData->execute();
        $selectData->fetchAll();
        
    }

    public function filterUsers(/*$user_id, $lastname, */$firstname/*, $birthdate, $genre, $city, $hobby*/) {
        $filterUsers = "SELECT user_id, lastname, firstname, birthdate, genre, city, hobby, zodiac_sign FROM user_horoscope";
        $conditions = [];
        $parameters = [];
    
        if (!empty($lastname)) {
            $conditions[] = "lastname LIKE :lastname";
            $parameters[':lastname'] = "%$lastname%";
        }
        if (!empty($firstname)) {
            $conditions[] = "firstname LIKE :firstname";
            $parameters[':firstname'] = "%$firstname%";
        }
        if (!empty($birthdate)) {
            $conditions[] = "birthdate = :birthdate";
            $parameters[':birthdate'] = $birthdate;
        }
        if (!empty($genre)) {
            $conditions[] = "genre = :genre";
            $parameters[':genre'] = $genre;
        }
        if (!empty($city)) {
            $conditions[] = "city = :city";
            $parameters[':city'] = $city;
        }
        if (!empty($hobby)) {
            $conditions[] = "hobby LIKE :hobby";
            $parameters[':hobby'] = "%$hobby%";
        }
        if (!empty($zodiac_sign)) {
            $conditions[] = "zodiac_sign LIKE :zodiac_sign";
            $parameters[':zodiac_sign'] = "%$zodiac_sign%";
        }
    
        if (!empty($conditions)) {
            $filterUsers .= " WHERE " . implode(" AND ", $conditions);
        }
    
        $stmt = $this->db->prepare($filterUsers);
    
        
        if (isset($parameters[':lastname'])) {
            $stmt->bindValue(':lastname', $parameters[':lastname'], PDO::PARAM_STR);
        }
        if (isset($parameters[':firstname'])) {
            $stmt->bindValue(':firstname', $parameters[':firstname'], PDO::PARAM_STR);
        }
        if (isset($parameters[':birthdate'])) {
            $stmt->bindValue(':birthdate', $parameters[':birthdate'], PDO::PARAM_STR);
        }
        if (isset($parameters[':genre'])) {
            $stmt->bindValue(':genre', $parameters[':genre'], PDO::PARAM_INT);
        }
        if (isset($parameters[':city'])) {
            $stmt->bindValue(':city', $parameters[':city'], PDO::PARAM_STR);
        }
        if (isset($parameters[':hobby'])) {
            $stmt->bindValue(':hobby', $parameters[':hobby'], PDO::PARAM_STR);
        }
        if (isset($parameters[':zodiac_sign'])) {
            $stmt->bindValue(':zodiac_sign', $parameters[':zodiac_sign'], PDO::PARAM_STR);
        }
    
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
    
        return $stmt->fetchAll();
    }

    /*
    public function getGenres() {
        $selectGenres = $this->db->prepare("SELECT DISTINCT `id_genre`, `genre_name` FROM `movie_genre_distributor` ORDER BY `genre_name` ASC");
        $selectGenres->setFetchMode(PDO::FETCH_ASSOC);
        $selectGenres->execute();
        return $selectGenres->fetchAll();
    }
    */
}

