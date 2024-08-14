<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkelwagen</title>
    @vite(['resources/js/app.js','resources/css/app.css'])
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }
        .cart-item h4 {
            margin: 0;
        }
        .quantity-controls {
            display: flex;
            align-items: center;
        }
        .quantity-controls input {
            width: 40px;
            text-align: center;
            margin: 0 5px;
        }
        .actions {
            display: flex;
            align-items: center;
        }
        .actions form {
            margin-left: 10px;
        }
        .back-btn, .checkout-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
        }
        .back-btn {
            background-color: #6c757d;
        }
        .timer {
            margin-top: 20px;
            font-size: 1.5em;
            color: red;
        }
    </style>
    <script>
    function startTimer(duration, display) {
        let timer = duration, minutes, seconds;
        const interval = setInterval(() => {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                clearInterval(interval);
                location.reload(); // Refresh de pagina als de tijd om is
            }
        }, 1000);
    }

    window.onload = function () {
        const endTime = new Date("{{ Session::get('checkout_end_time')->toIso8601String() }}").getTime();
        const now = new Date().getTime();
        const remainingTime = (endTime - now) / 1000;

        if (remainingTime > 0) {
            const display = document.querySelector('#time');
            startTimer(remainingTime, display);
        }
    };
</script>
</head>
<body>
    <div class="container">
        <h1>Winkelwagen</h1>

        <a href="{{ route('cart.index') }}" class="back-btn">Terug naar Bestellen</a>
       
        @if(count($cart) > 0)
            @foreach($cart as $itemId => $item)
                <div class="cart-item">
                    <div>
                        <h4>{{ $item['name'] }}</h4>
                        <p>€{{ number_format($item['price'], 2) }}</p>
                    </div>
                    <div class="quantity-controls">
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $itemId }}">
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="8">
                            <button type="submit">Bijwerken</button>
                        </form>
                    </div>
                    <div class="actions">
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $itemId }}">
                            <button type="submit" class="remove-btn">Verwijderen</button>
                        </form>
                    </div>
                </div>
            @endforeach

            @if(!Session::has('checkout_end_time') || now()->greaterThan(Session::get('checkout_end_time')))
            <div class="checkout">
                <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="checkout-btn">Uitchecken</button>
                </form>
            </div>
            @else
            <div class="timer">
                Je kunt weer bestellen over <span id="time"></span> minuten.
            </div>
            @endif
        @else
            <p>Je winkelwagen is leeg of je moet wachten tot de timer is afgelopen.</p>
        @endif
    </div>
</body>
</html>
