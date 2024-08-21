<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kassa Zoekfunctie</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Kassa - Zoekfunctie</h1>

    <form method="GET" action="{{ route('kassa.index') }}" class="row mb-4">
        <div class="col-md-4">
            <input type="text" name="search" placeholder="Zoek op naam of nummer" value="{{ request('search') }}" class="form-control">
        </div>
        <div class="col-md-4">
            <select name="category" class="form-select" onchange="this.form.submit()">
                <option value="">Alle Categorieën</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->soortgerecht }}" {{ request('category') == $category->soortgerecht ? 'selected' : '' }}>
                        {{ $category->soortgerecht }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Zoeken</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gerecht Nummer</th>
                <th>Naam</th>
                <th>Prijs</th>
                <th>Categorie</th>
                <th>Beschrijving</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menu as $item)
                <tr>
                    <td>{{ $item->menunummer }}</td>
                    <td>{{ $item->naam }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->soortgerecht }}</td>
                    <td>{{ $item->beschrijving }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $menu->links() }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
