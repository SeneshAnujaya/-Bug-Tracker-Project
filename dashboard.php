<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}
?>


<?php
$bugs = file_exists('data/bugs.json') ? json_decode(file_get_contents('data/bugs.json'), true) : [];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>

   <!-- Style CSS -->
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>
<body>
<div class="dashboard-wrapper">
    <div class="dashboard-container">
  <h2 class="dashboard-title">Bug Report Dashboard</h2>

  <!--bug Filter labels -->
  <div class="filter-wrapper">
    <div class="filter-labels-wrapper">
 <label>Status:
    <select id="statusFilter">
      <option value="">All</option>
      <option value="Open">Open</option>
      <option value="In Progress">In Progress</option>
      <option value="Resolved">Resolved</option>
    </select>
  </label>

  <label>Priority:
    <select id="priorityFilter">
      <option value="">All</option>
      <option value="Low">Low</option>
      <option value="Medium">Medium</option>
      <option value="High">High</option>
    </select>
  </label>
</div>
  <div class="logout-wrapper">
    <p>Welcome, <?= htmlspecialchars($_SESSION['user']) ?>  
  <a class="logout-btn" href="logout.php">Logout</a>
</p>
  </div>
</div>

  <table border="1" cellpadding="8">
    <tr>
      <th>Title</th><th>Description</th><th>Reporter</th><th>Priority</th><th>Status</th><th>Action</th>
    </tr>
    <tbody id="bugsTable">
    <?php foreach ($bugs as $i => $bug): ?>
      <tr data-status="<?= $bug['status'] ?>" data-priority="<?= $bug['priority'] ?>">
       
          <td><?= htmlspecialchars($bug['title']) ?></td>
          <td><?= htmlspecialchars($bug['description']) ?></td>
          <td><?= htmlspecialchars($bug['reporter']) ?></td>
          <td><?= $bug['priority'] ?></td>
          <form method="POST" action="update.php">
            <td>
              <select name="status">
                <?php foreach (['Open', 'In Progress', 'Resolved'] as $s): ?>
                  <option <?= $s === $bug['status'] ? 'selected' : '' ?>><?= $s ?></option>
                <?php endforeach; ?>
              </select>
            </td>
            <td>
              <input type="hidden" name="index" value="<?= $i ?>" />
              <button type="submit" class="update-btn">Update</button>
            </td>
          </form>
      </tr>
    <?php endforeach; ?>
              </tbody>
  </table>
              </div>
  </div>

  <!-- dashboard script js -->
    <script src="assets/js/dashboard-script.js"></script>
</body>
</html>
