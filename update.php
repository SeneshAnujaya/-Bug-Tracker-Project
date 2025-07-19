<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $index = $_POST['index'];
  $status = $_POST['status'];
  $bugs = json_decode(file_get_contents('data/bugs.json'), true);
  $bugs[$index]['status'] = $status;
  file_put_contents('data/bugs.json', json_encode($bugs, JSON_PRETTY_PRINT));
}
header("Location: dashboard.php");
exit;
