<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . "/../../config/database.php";
include_once __DIR__ . "/../../config/session.php";


 //FETCH ASTRO SIGN
 class ZodiacModel extends Database {
    public function zodiacFetch() {
        $birthdate = $_SESSION['birthday'];
        $zodiac = $this->db->prepare("
            SELECT h.name
            FROM horoscope h
            INNER JOIN users u
            WHERE (h.date_start > h.date_end
                AND :birthdate BETWEEN STR_TO_DATE(CONCAT(YEAR(:birthdate) - 1, '-', h.date_start), '%Y-%m-%d')
                AND STR_TO_DATE(CONCAT(YEAR(:birthdate), '-', h.date_end), '%Y-%m-%d'))
            OR (h.date_start < h.date_end
                AND :birthdate BETWEEN STR_TO_DATE(CONCAT(YEAR(:birthdate), '-', h.date_start), '%Y-%m-%d')
                AND STR_TO_DATE(CONCAT(YEAR(:birthdate), '-', h.date_end), '%Y-%m-%d'));
        ");
        
        $zodiac->bindParam(':birthdate', $birthdate);
        $zodiac->execute();
        return $zodiacData = $zodiac->fetch(PDO::FETCH_ASSOC);
    }
}

$zodiacModel = new ZodiacModel();
$callZodiacFetch = $zodiacModel->zodiacFetch();
