<?php
require './meetingModel.php';

if (isset($_GET['firstname'])) {
    $name = $_GET['firstname'];
}

if (isset($_GET['genre'])) {
    $genre = $_GET['genre'];
}

$mettingModel = new MeetingModel();

if (!empty($firstname) /*|| !empty($genre*/) {
    $searchResults = $meetingModel->filterUsers($firstname/*, $genre, $distributor*/);
} else {
    $searchResults = $meetingModel->getAllData();
}

/*$genres = $movieModel->getGenres();*/

require './meetingView.php';