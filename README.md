# Esercizio Base64: Offuscamento dei parametri GET in PHP

Questo progetto dimostra come offuscare i parametri trasmessi via metodo HTTP `GET` utilizzando la codifica `base64`, con l'obiettivo di introdurre agli studenti il concetto di mitigazione della visibilità diretta dei dati nell'URL.

## 🎯 Obiettivo didattico

- Comprendere il funzionamento del metodo `GET` e la sua esposizione dei dati.
- Introdurre tecniche di offuscamento lato client con `btoa()` (JavaScript) e lato server con `base64_encode()` / `base64_decode()` (PHP).
- Stimolare una riflessione critica sulla differenza tra offuscazione e cifratura.

## 📦 Componenti del progetto

- `login.php` — Form di accesso con codifica base64 via JavaScript.
- `controllo.php` — Decodifica dei parametri e verifica delle credenziali.
- `utenti.json` — Archivio locale degli utenti registrati.

## 🔐 Flusso di autenticazione

1. L'utente inserisce login e password nel form.
2. Prima dell'invio, i dati vengono codificati in base64 con `btoa()` e inseriti in campi nascosti.
3. Il server riceve i parametri codificati via `GET`.
4. `controllo.php` decodifica i valori con `base64_decode()` e li confronta con il file `utenti.json`.

## 📁 Esempio di URL offuscato


## ⚠️ Considerazioni sulla sicurezza

> La codifica base64 **non è una forma di cifratura**. I dati rimangono facilmente decodificabili e visibili. Questa tecnica serve solo a **mitigare la leggibilità immediata** dei parametri nell’URL, utile in contesti didattici per introdurre il concetto di protezione dei dati.

Per proteggere realmente le credenziali:
- Usare il metodo `POST` per trasmettere i dati.
- Proteggere la connessione con `HTTPS`.
- Salvare le password con `password_hash()` e verificarle con `password_verify()`.

## 📚 Estensioni suggerite

- Implementazione con `POST` e confronto sicuro.
- Cifratura simmetrica con `openssl_encrypt()`.
- Gestione sessioni e logout.
- Validazione lato server e client.
