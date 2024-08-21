@extends('layouts.kassa')

@section('content')
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

    <!-- Pagination links -->
    <div class="d-flex justify-content-center">
        {{ $menu->links() }}
    </div>
@endsection
