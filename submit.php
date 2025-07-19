<?php
$data = json_decode(file_get_contents("php://input"), true);
if (!$data) {
  echo json_encode(["message" => "Invalid input"]);
  exit;
}

$title = trim($data['title']);
$description = trim($data['description']);
$reporter = trim($data['reporter']);
$priority = trim($data['priority']);
$date = date('Y-m-d H:i:s');
$status = 'Open';

$bug = compact('title', 'description', 'reporter', 'priority', 'status', 'date');

// Load existing
$existing = file_exists('data/bugs.json') ? json_decode(file_get_contents('data/bugs.json'), true) : [];

// Check duplicates bugs
include 'utils.php';
if (isDuplicate($bug, $existing)) {
  echo json_encode(["message" => "Similar bug already reported beofre"]);
  exit;
}

$existing[] = $bug;
file_put_contents('data/bugs.json', json_encode($existing, JSON_PRETTY_PRINT));

echo json_encode(["message" => "Bug is submitted successfully!"]);

?>
