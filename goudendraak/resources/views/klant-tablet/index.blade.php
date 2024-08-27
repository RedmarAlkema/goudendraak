<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellen</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link rel="stylesheet" href="{{ asset('css/menuStyles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app" class="container mt-4">
        @if(Session::has('round'))
            <div class="alert alert-info position-fixed top-0 start-0 mt-2 ms-2">
                Ronde {{ Session::get('round') }}
            </div>
        @else
            <div class="alert alert-info position-fixed top-0 start-0 mt-2 ms-2">
                Ronde 1
            </div>
        @endif
        

        @if(session('error'))
            <div class="alert alert-warning text-center">
                {{ session('error') }}
            </div>
        @endif

        @if(Session::has('table'))
            <div class="text-center">
                <h2 class="text-primary">Tafelnummer: {{ Session::get('table')->table_number }}</h2>
            </div>

            <shopping-cart-component></shopping-cart-component>
            <menu-component :menus="{{ json_encode($menus) }}"></menu-component>
        @else
            <div class="card mx-auto mt-4 card-max-width">
                <div class="card-body text-center bg-light border-primary">
                    <form action="{{ route('cart.storeTableNumber') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="table_number" class="form-label text-primary">Voer uw tafelnummer in:</label>
                            <input type="number" id="table_number" name="table_number" class="form-control" min="1" required>
                        </div>
                        <button type="submit" class="btn btn-success">Tafelnummer opslaan</button>
                    </form>
                </div>
            </div>
        @endif

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
