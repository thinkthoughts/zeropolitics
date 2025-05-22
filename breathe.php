<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('UTC');

$file = 'oxygen-events.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $statement = trim($_POST['statement']);
    $pi = '9425π';
    $timestamp = gmdate("Y-m-d\TH:i:s\Z");

    $entry = [
        "statement" => $statement,
        "pi" => $pi,
        "timestamp" => $timestamp
    ];

    $events = [];
    if (file_exists($file)) {
        $events = json_decode(file_get_contents($file), true);
    }

    array_unshift($events, $entry);
    file_put_contents($file, json_encode($events, JSON_PRETTY_PRINT));
    header("Location: breathe.php?success=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Breathe Declaration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body { background: #0e0e0e; color: #e0e0e0; font-family: monospace; padding: 2rem; max-width: 900px; margin: auto; }
    h1 { color: #94e0ff; }
    input, select, button {
      background: #1c1c1c; color: #e0e0e0; border: 1px solid #444;
      padding: 0.5rem; border-radius: 4px; width: 100%; margin-bottom: 1rem;
    }
    button { cursor: pointer; background-color: #444; }
    .success { color: #66ff66; margin-top: 1rem; }
    a { color: #ffc57a; }
  </style>
</head>
<body>

  <h1>Declare Breath (9425π)</h1>
  <form method="POST" action="breathe.php">
    <label for="preset">Select Preset</label>
    <select id="preset">
      <option value="">— Choose a preset phrase —</option>
      <option value="Gaza breathes now">Gaza breathes now (English)</option>
      <option value="غزة تتنفس الآن">غزة تتنفس الآن (Arabic)</option>
      <option value="Gaza respira ahora">Gaza respira ahora (Spanish)</option>
      <option value="Gaza respire maintenant">Gaza respire maintenant (French)</option>
      <option value="Gaza inapumua sasa">Gaza inapumua sasa (Swahili)</option>
      <option value="עזה נושמת עכשיו">עזה נושמת עכשיו (Hebrew)</option>
      <option value="غزه اکنون نفس می‌کشد">غزه اکنون نفس می‌کشد (Farsi)</option>
    </select>

    <label for="statement">Or write your own</label>
    <input type="text" name="statement" id="statement" placeholder="e.g. Gaza breathes now" required />

    <button type="submit">Declare</button>
  </form>

  <?php if (isset($_GET['success'])): ?>
    <p class="success">✅ Breath logged to 9425π</p>
  <?php endif; ?>

  <p><a href="breath.html">→ View Breath Log</a></p>
  <p><a href="index.php">← Back to Home</a></p>

  <script>
    document.getElementById('preset').addEventListener('change', function() {
      const statement = document.getElementById('statement');
      if (this.value) {
        statement.value = this.value;
      }
    });
  </script>

</body>
</html>
