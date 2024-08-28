@extends('layouts.kassa')

@section('content')
    <h1 class="text-center mb-4">Kassa - Zoekfunctie</h1>

    <form method="GET" action="{{ route('kassa.index') }}" class="row mb-4">
        <div class="col-md-4 mb-3 mb-md-0">
            <input type="text" name="search" placeholder="Zoek op naam of nummer" value="{{ request('search') }}" class="form-control">
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
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
            <button type="submit" class="btn btn-primary w-100">Zoeken</button>
        </div>
    </form>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
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
                @if(!request('category') || request('category') == $item->soortgerecht)
                    <tr>
                        <td>{{ $item->menunummer }}</td>
                        <td>{{ $item->naam }}</td>
                        <td>€ {{ number_format($item->price, 2, ',', '.') }}</td>
                        <td>{{ $item->soortgerecht }}</td>
                        <td>{{ $item->beschrijving }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $menu->links() }}
    </div>
@endsection
