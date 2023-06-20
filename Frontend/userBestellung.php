<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellung</title>
</head>

<body>
    <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Lieferadresse wählen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="message-container"></div>
                    <div id="addressForm" class="container">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="addressType" id="savedAddress" checked>
                            <label class="form-check-label" for="savedAddress">
                                Gespeicherte Adresse
                            </label>
                        </div>
                        <div id="savedAddressFields" class="form-group">
                            <label for="street">Adresse:</label>
                            <input type="text" id="savedStreet" class="form-control" disabled>
                            <label for="plz">Postleitzahl:</label>
                            <input type="text" id="savedPostcode" class="form-control" disabled>
                            <label for="ort">Ort:</label>
                            <input type="text" id="savedCity" class="form-control" disabled>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="addressType" id="newOrderAddress">
                            <label class="form-check-label" for="newOrderAddress">
                                Neue Adresse
                            </label>
                        </div>
                        <div id="newAddressFields" class="form-group">
                            <label for="newStreet">Adresse:</label>
                            <input type="text" id="newOrderStreet" class="form-control" placeholder="Wohnstraße123">
                            <label for="newPlz">Postleitzahl:</label>
                            <input type="text" id="newOrderPostcode" class="form-control" placeholder="1100">
                            <label for="newOrt">Ort:</label>
                            <input type="text" id="newOrderCity" class="form-control" placeholder="Wien">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="bestätigenBestellung" type="button" class="btn btn-success">Bestätigen & Bestellen</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Bestellung erfolgreich</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="message-container"></div>
                    <div id="printReceiptForm" class="container">
                        <div class="row justify-content-center">
                            <div class="col-sm-auto">
                                <button id="printReceipt" type="button" class="btn btn-success">Rechnung
                                    drucken</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="userBestellung.js"></script>

</body>

</html>