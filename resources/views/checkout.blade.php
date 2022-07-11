<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #242d60;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto',
            'Helvetica Neue', 'Ubuntu', sans-serif;
            height: 100vh;
            margin: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        section {
            background: #ffffff;
            display: flex;
            flex-direction: column;
            width: 400px;
            height: 112px;
            border-radius: 6px;
            justify-content: space-between;
        }
        .product {
            display: flex;
        }
        .description {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        p {
            font-style: normal;
            font-weight: 500;
            font-size: 14px;
            line-height: 20px;
            letter-spacing: -0.154px;
            color: #242d60;
            height: 100%;
            width: 100%;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
        }
        img {
            border-radius: 6px;
            margin: 10px;
            width: 54px;
            height: 57px;
        }
        h3,
        h5 {
            font-style: normal;
            font-weight: 500;
            font-size: 14px;
            line-height: 20px;
            letter-spacing: -0.154px;
            color: #242d60;
            margin: 0;
        }
        h5 {
            opacity: 0.5;
        }
        #checkout-button {
            height: 36px;
            background: #556cd6;
            color: white;
            width: 100%;
            font-size: 14px;
            border: 0;
            font-weight: 500;
            cursor: pointer;
            border-radius: 0 0 6px 6px;
            transition: all 0.2s ease;
            box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
        }
        #checkout-button:hover {
            opacity: 0.8;
        }

    </style>
</head>
<body>
<section>
    <div class="product">
        <div class="description">
            <h3>Stubborn Attachments</h3>
            <h5>$20.00</h5>
        </div>
    </div>
    <button type="button" id="checkout-button">Checkout</button>
</section>
</body>
<script type="text/javascript">
        // Create an instance of the Stripe object with your publishable API key
        var stripe = Stripe("{{ env('STRIPE_KEY') }}");
        var checkoutButton = document.getElementById("checkout-button");
        checkoutButton.addEventListener("click", function () {
            fetch("{{ route('stripe-store') }}", {
                method: "POST",
            })
                .then(function (response) {
                    return response.json();
                })
                .then(function (session) {
                    return stripe.redirectToCheckout({ sessionId: session.id });
                })
                .then(function (result) {
                    // If redirectToCheckout fails due to a browser or network
                    // error, you should display the localized error message to your
                    // customer using error.message.
                    if (result.error) {
                        alert(result.error.message);
                    }
                })
                .catch(function (error) {
                    console.error("Error:", error);
                });
        });
</script>
</html>
