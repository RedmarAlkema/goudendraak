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
    </style>
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

            <div class="checkout">
                <button type="button" class="checkout-btn" onclick="alert('Uitchecken nog niet geïmplementeerd!')">Uitchecken</button>
            </div>
        @else
            <p>Je winkelwagen is leeg.</p>
        @endif
    </div>
</body>
</html>
