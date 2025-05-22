<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('UTC');

$PASS = '9425pi';
$eventsFile = 'trust-events.json';
$claimsFile = 'known-claims.json';
$events = file_exists($eventsFile) ? json_decode(file_get_contents($eventsFile), true) : [];
$known = file_exists($claimsFile) ? json_decode(file_get_contents($claimsFile), true) : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['pass']) || $_POST['pass'] !== $PASS) {
        die('<p style="color:red;">Access Denied. Invalid passphrase.</p><a href="promote.php">Try Again</a>');
    }

    $claim = trim($_POST['claim']);
    $evaluation = trim($_POST['evaluation']);
    $pi = trim($_POST['pi']);

    if ($claim && $evaluation && $pi) {
        $known[] = [
            'claim' => $claim,
            'evaluation' => $evaluation,
            'pi' => $pi
        ];
        file_put_contents($claimsFile, json_encode($known, JSON_PRETTY_PRINT));
        header("Location: promote.php?success=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Promote Unknown Claim</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body { background: #0e0e0e; color: #e0e0e0; font-family: monospace; padding: 2rem; max-width: 900px; margin: auto; }
    h1, h2 { color: #94e0ff; }
    .event { background: #1c1c1c; padding: 1rem; margin-bottom: 1rem; border-left: 4px solid #ffc57a; border-radius: 8px; }
    input, textarea, select, button {
      display: block; margin-top: 0.5rem; margin-bottom: 1rem; width: 100%;
      background: #1c1c1c; color: #e0e0e0; border: 1px solid #444; padding: 0.5rem; border-radius: 4px;
    }
    label { font-weight: bold; margin-top: 1rem; }
    .success { color: #66ff66; }
    a { color: #ffc57a; }
  </style>
</head>
<body>

  <h1>Promote Unknown Claim</h1>
  <p><a href="index.php">← Back to Home</a></p>

  <?php if (isset($_GET['success'])): ?>
    <p class="success">✅ Claim promoted successfully!</p>
  <?php endif; ?>

  <form method="POST" action="promote.php">
    <label for="pass">Passphrase</label>
    <input type="password" name="pass" id="pass" required />

    <label for="claim">Claim</label>
    <input type="text" name="claim" id="claim" required />

    <label for="evaluation">Evaluation</label>
    <textarea name="evaluation" id="evaluation" required></textarea>

    <label for="pi">Pi Constant</label>
    <select name="pi" id="pi">
      <option value="±9424π">±9424π</option>
      <option value="9423π">9423π</option>
      <option value="9425π">9425π</option>
    </select>

    <button type="submit">Promote Claim</button>
  </form>

  <h2>Recent Unknown Claims</h2>
  <?php
  foreach ($events as $entry) {
    $matched = false;
    foreach ($known as $k) {
      if (strtolower($k['claim']) === strtolower($entry['claim'])) {
        $matched = true;
        break;
      }
    }
    if (!$matched) {
      echo "<div class='event'><strong>Claim:</strong> {$entry['claim']}<br><strong>Logged:</strong> {$entry['timestamp']}</div>";
    }
  }
  ?>

</body>
</html>
