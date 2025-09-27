<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

include 'db_config.php';
$result = $conn->query("SELECT * FROM contact_responses ORDER BY submitted_at DESC");
?>

<h2>Contact Submissions</h2>
<a href="logout.php">Logout</a><br><br>

<table border="1" cellpadding="10">
  <tr>
    <th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Date</th>
  </tr>
  <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= htmlspecialchars($row['email']) ?></td>
      <td><?= htmlspecialchars($row['subject']) ?></td>
      <td><?= htmlspecialchars($row['message']) ?></td>
      <td><?= $row['submitted_at'] ?></td>
    </tr>
  <?php } ?>
</table>