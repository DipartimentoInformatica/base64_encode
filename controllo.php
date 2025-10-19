<?php
$filename = 'utenti.json';

if (isset($_GET['login']) && isset($_GET['password'])) {
  $login = base64_decode($_GET['login']);
  $password = base64_decode($_GET['password']);

  $json = file_get_contents($filename);
  $utenti = json_decode($json, true);
  $trovato = false;

  foreach ($utenti as $utente) {
    if ($utente['login'] === $login && $utente['password'] === $password) {
      echo "<h4 class='mb-3'>Benvenuto, {$utente['nome']} {$utente['cognome']}</h4>";
      echo "<p><strong>Login:</strong> {$utente['login']}</p>";
      echo "<p><strong>Email:</strong> {$utente['email']}</p>";
      $trovato = true;
      break;
    }
  }

  if (!$trovato) {
    echo "<h4 class='text-danger'>Credenziali errate</h4>";
  }
} else {
  echo "<h4 class='text-warning'>Login e password non ricevuti</h4>";
}
?>
