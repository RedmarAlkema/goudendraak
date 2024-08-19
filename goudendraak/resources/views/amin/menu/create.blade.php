<!-- @extends('layouts.admin')

@section('content') -->
<h1>Nieuw Gerecht</h1>

<form action="{{ route('admin.menu.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="menunummer">Menunummer</label>
        <input type="number" class="form-control" name="menunummer" value="{{ old('menunummer') }}" required>
    </div>

    <div class="form-group">
        <label for="menu_toevoeging">Menu Toevoeging</label>
        <input type="text" class="form-control" name="menu_toevoeging" value="{{ old('menu_toevoeging') }}">
    </div>

    <div class="form-group">
        <label for="naam">Naam</label>
        <input type="text" class="form-control" name="naam" value="{{ old('naam') }}" required>
    </div>

    <div class="form-group">
        <label for="price">Prijs</label>
        <input type="text" class="form-control" name="price" value="{{ old('price') }}" required>
    </div>

    <div class="form-group">
        <label for="soortgerecht">Soortgerecht</label>
        <input type="text" class="form-control" name="soortgerecht" value="{{ old('soortgerecht') }}" required>
    </div>

    <div class="form-group">
        <label for="beschrijving">Beschrijving</label>
        <textarea class="form-control" name="beschrijving">{{ old('beschrijving') }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Toevoegen</button>
</form>
<!-- @endsection -->
