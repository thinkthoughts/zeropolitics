<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('UTC');

// Load known claims
$knownClaimsFile = 'known-claims.json';
$knownClaims = [];

if (file_exists($knownClaimsFile)) {
    $knownClaims = json_decode(file_get_contents($knownClaimsFile), true);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $claim = trim($_POST['claim']);
    $timestamp = gmdate("Y-m-d\TH:i:s\Z");
    $evaluation = "Unknown claim — no protocol match";

    foreach ($knownClaims as $item) {
        if (strtolower($claim) === strtolower($item['claim'])) {
            $evaluation = $item['evaluation'];
            break;
        }
    }

    $entry = array(
        "claim" => $claim,
        "evaluation" => $evaluation,
        "timestamp" => $timestamp
    );

    $filename = "trust-events.json";
    $events = [];

    if (file_exists($filename)) {
        $events = json_decode(file_get_contents($filename), true);
    }

    array_unshift($events, $entry);
    file_put_contents($filename, json_encode($events, JSON_PRETTY_PRINT));
    header("Location: trust.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Triplet Trust Verifier</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body { background: #0e0e0e; color: #e0e0e0; font-family: monospace; padding: 2rem; max-width: 800px; margin: auto; }
    h1 { color: #94e0ff; }
    input, button {
      background: #1c1c1c; color: #e0e0e0; border: 1px solid #444;
      padding: 0.5rem; margin-top: 0.5rem; border-radius: 4px; width: 100%;
    }
    button { cursor: pointer; background-color: #444; margin-bottom: 1rem; }
    a { color: #ffc57a; }
  </style>
</head>
<body>

  <h1>Triplet Trust Verifier</h1>
  <form method="POST" action="verify.php">
    <input type="text" name="claim" placeholder="e.g. Gaza breathes now" required>
    <button type="submit">Evaluate</button>
  </form>

  <p><a href="trust.html">→ View Trust Log</a></p>
  <p><a href="index.php">← Back to Home</a></p>

</body>
</html>
