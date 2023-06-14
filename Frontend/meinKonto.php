<!DOCTYPE html>
<html>
<head>
<?php
include ("navbar.php");
?>
  <title>Mein Konto</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="meinKonto.js"></script>
</head>
<body>
  
  <h2>Stammdaten bearbeiten</h2>
  <div id="stammdaten">
  <form id="passwortForm">
    <label for="u_username">Benutzername:</label>
    <input type="text" id="u_username" name="u_username" required><br>
    
    <label for="oldPassword">Altes Passwort:</label>
    <input type="password" id="oldPassword" name="oldPassword" required><br>
    
    <label for="newPassword">Neues Passwort:</label>
    <input type="password" id="newPassword" name="newPassword" required><br>
    
    <label for="confirmPassword">Passwort bestätigen:</label>
    <input type="password" id="confirmPassword" name="confirmPassword" required><br>
    
    <button type="submit">Passwort ändern</button>
  </form>
  
  <h2>Zahlungsmöglichkeiten</h2>
  <form action="add_payment.php" method="post">
    <label for="payment">Neue Zahlungsmöglichkeit hinzufügen:</label>
    <input type="text" id="payment" name="payment"><br><br>

    <input type="submit" value="Zahlungsmöglichkeit hinzufügen">
  </form>
  
  <h2>Bestellungen</h2>
  <select id="sort">
    <option value="ascending"></option>
    <option value="descending">Absteigend</option>
  </select>
  <button onclick="sortOrders()">Sortieren</button><br><br>

  <ul id="orderList">
    <li>
      <strong>Bestellung #12345</strong>
      <button onclick="printInvoice(12345)">Rechnung drucken</button><br>
      Datum: 2023-06-10<br>
      Details: Lorem ipsum dolor sit amet<br>
    </li>
    <li>
      <strong>Bestellung #67890</strong>
      <button onclick="printInvoice(67890)">Rechnung drucken</button><br>
      Datum: 2023-06-05<br>
      Details: Consectetur adipiscing elit<br>
    </li>
  </ul>


  <?php include 'footer.php'; ?>
</body>
</html>
