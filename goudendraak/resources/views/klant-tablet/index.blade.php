<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellen</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/app.js','resources/css/app.css'])
    <style>
        .round-display {
            position: fixed;
            top: 10px;
            left: 10px;
            background-color: #f8f9fa;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        .table-number-form {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
            max-width: 400px;
            margin: 20px auto;
            text-align: center;
        }
        .table-info {
            text-align: center;
            margin-top: 20px;
        }
        .table-info p {
            font-size: 1.5em;
            font-weight: bold;
        }
        .message {
            text-align: center;
            margin-bottom: 20px;
        }
        .message p {
            margin: 0;
            padding: 10px;
            border-radius: 5px;
        }
        .message .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div id="app">
        @if(Session::has('round'))
            <div class="round-display">
                Round {{ Session::get('round') }}
            </div>
        @endif

        <div class="message">
            @if(session('error'))
                <p class="error">{{ session('error') }}</p>
            @endif
        </div>

        @if(Session::has('table'))
            <div class="table-info">
                <p>Tafelnummer: {{ Session::get('table')->table_number }}</p>
            </div>
        @else
            <div class="table-number-form">
                <form action="{{ route('cart.storeTableNumber') }}" method="POST">
                    @csrf
                    <label for="table_number">Voer uw tafelnummer in:</label><br>
                    <input type="number" id="table_number" name="table_number" min="1" required>
                    <br>
                    <button type="submit">Tafelnummer opslaan</button>
                </form>
            </div>
        @endif

        <shopping-cart-component></shopping-cart-component>
        <menu-component :menus="{{ json_encode($menus) }}"></menu-component>
    </div>
</body>
</html>
