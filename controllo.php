<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Verifica credenziali</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container vh-100 d-flex flex-column justify-content-center">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-body text-center">
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
                  echo "<h4 class='mb-3 text-success'>Benvenuto, {$utente['nome']} {$utente['cognome']}</h4>";
                  echo "<p><strong>Login:</strong> {$utente['login']}</p>";
                  echo "<p><strong>Email:</strong> {$utente['email']}</p>";
                  $trovato = true;
                  break;
                }
              }

              if (!$trovato) {
                echo "<h4 class='text-danger mb-3'>Credenziali errate</h4>";
                echo "<p>Verifica di aver digitato correttamente login e password.</p>";
              }
            } else {
              echo "<h4 class='text-warning mb-3'>Login e password non ricevuti</h4>";
              echo "<p>Assicurati di compilare entrambi i campi nel form di accesso.</p>";
            }
            ?>
            <div class="mt-4">
              <a href="index.html" class="btn btn-outline-primary">Torna al login</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col text-center">
        <small>&copy; 2025 - La tua azienda</small>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
