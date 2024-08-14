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
        .reserve-link {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }
        .reserve-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tafel Overzicht</h1>
        <ul class="table-list">
            @foreach($tables as $table)
                <li class="table-item">
                    <span>Tafelnummer: {{ $table->table_number }}</span>
                    <span>Plekken: {{$table->space }}</span>
                    @if($table->occupied)
                        <span class="occupied">Bezet</span>
                    @else
                        <span class="available">Beschikbaar</span>
                        <a href="{{ route('tables.reserve', $table->id) }}" class="reserve-link">Reserveren</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
