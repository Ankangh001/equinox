<!DOCTYPE html>
<html>
<head>
    <title>Square Payment Integration</title>
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        button {
            display: block;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Square Payment Integration</h1>
        <form id="payment-form" method="POST">
            <div id="card-container"></div>
            <button type="submit">Pay</button>
        </form>
    </div>

    <script src="https://js.squareupsandbox.com/v2/paymentform"></script>
    <script>
        let BASEURL = "<?=base_url()?>";
document.addEventListener('DOMContentLoaded', function () {
    const paymentForm = new SqPaymentForm({
        applicationId: 'sandbox-sq0idb-bKU_tsCUTINR2tS0wUGVnA',
        inputClass: 'sq-input',
        autoBuild: false,
        card: {
            elementId: 'card-container',
            placeholder: 'Card Number'
        },
        callbacks: {
            cardNonceResponseReceived: function (errors, nonce, cardData) {
                if (errors) {
                    console.error('Encountered errors:', errors);
                    return;
                }

                // Submit the nonce to the server
                fetch(BASEURL+'square/pay', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ nonce: nonce })
                })
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    console.log(data);
                    // Handle the server response (success or failure) here
                })
                .catch(function (error) {
                    console.error('Error:', error);
                });
            }
        }
    });

    paymentForm.build();

    document.getElementById('payment-form').addEventListener('submit', function (event) {
        event.preventDefault();
        paymentForm.requestCardNonce();
    });
});

    </script>
</body>
</html>
