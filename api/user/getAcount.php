<?php

//Vérifie sur l'argument username est présent
if (!isset($_GET["username"])) {
    $usernameParam = null;
} else {
    $usernameParam = $_GET["username"];
};

header("Access-Control-Allow-Origin: *");
$adress = '86.248.178.158';
$username = 'projet_sdg_site';
$password = '104siteDNL';
$databaseName = "projet_sdg";
$port = "3306";

$conn = new mysqli($adress, $username, $password, $databaseName, $port);


if($conn->connect_error){
    die('Erreur : ' .$conn->connect_error);
    return false;
}

if ($usernameParam == null) {
    $result = $conn->query("SELECT id,username,pictureLink FROM users ORDER BY username ASC LIMIT 20");
} else {
    $result = $conn->query("SELECT id,username,pictureLink FROM users WHERE username='".$usernameParam."' ORDER BY username ASC");
}

$resArray = array();
while ($donne=$result->fetch_array()) {
    $json = array(
        "id" => $donne["id"],
        "username" => $donne["username"],
        "picturelink" => $donne["pictureLink"],
    );
    array_push($resArray, $json);
}

echo json_encode($resArray, JSON_PRETTY_PRINT);
?>