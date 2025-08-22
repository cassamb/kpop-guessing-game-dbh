<?php

require_once "dbh.inc.php";

// Preparing and executing the query
$query = $pdo->prepare("SELECT * FROM groups");
$query->execute();

// Fetching the data as an associative array
$groups = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($groups); // Converts result/server response to JSON format