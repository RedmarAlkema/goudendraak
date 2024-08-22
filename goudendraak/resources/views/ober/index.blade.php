<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tafel Overzicht</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Tafel Overzicht</h1>
        <div class="list-group">
            @foreach($tables as $table)
                <div class="list-group-item d-flex justify-content-between align-items-center @if($table->occupied) list-group-item-danger @else list-group-item-success @endif">
                    <div>
                        <h5>Tafelnummer: {{ $table->table_number }}</h5>
                        <p>Plekken: {{$table->space }}</p>
                    </div>
                    <div class="text-end">
                        @if($table->occupied)
                            <p class="mb-2">Bezet</p>
                            <p>Te betalen bedrag: € {{ number_format($table->total, 2, ',', '.') }}</p>
                            <form action="{{ route('tables.finalize', $table->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-primary">Betalen</button>
                            </form>
                        @else
                            <p class="mb-2">Beschikbaar</p>
                            <a href="{{ route('tables.reserve', $table->id) }}" class="btn btn-success">Reserveren</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="overlay" class="overlay hidden"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
