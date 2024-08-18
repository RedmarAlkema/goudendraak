<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tafel Overzicht</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .table-list {
            list-style: none;
            padding: 0;
        }
        .table-item {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .occupied {
            color: red;
            font-weight: bold;
        }
        .available {
            color: green;
            font-weight: bold;
        }
        .reserve-link, .pay-btn, .option-btn, .cancel-btn {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .reserve-link:hover, .pay-btn:hover, .option-btn:hover, .cancel-btn:hover {
            background-color: #0056b3;
        }
        .hidden {
            display: none;
        }
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            border-radius: 5px;
            z-index: 1000;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tafel Overzicht</h1>
        <ul class="table-list">
            @foreach($tables as $table)
                <li class="table-item" data-table-id="{{ $table->id }}" data-table-total="{{ number_format($table->total, 2, ',', '.') }}">
                    <span>Tafelnummer: {{ $table->table_number }}</span>
                    <span>Plekken: {{$table->space }}</span>
                    @if($table->occupied)
                        <span class="occupied">Bezet</span>
                        <p>Te betalen bedrag: € {{ $table->total }}</span></p>
                        <form action="{{ route('tables.finalize', $table->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="pay-btn">Betalen</button>
                        </form>
                       
                    @else
                        <span class="available">Beschikbaar</span>
                        <a href="{{ route('tables.reserve', $table->id) }}" class="reserve-link">Reserveren</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
    
    <div id="overlay" class="overlay hidden"></div>

    <script>
        
    </script>
</body>
</html>
