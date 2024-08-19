<!-- @extends('layouts.admin')

@section('content') -->
<h1>Bewerk Gerecht</h1>

<form action="{{ route('admin.menu.update', $menu->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="menunummer">Menunummer</label>
        <input type="number" class="form-control" name="menunummer" value="{{ $menu->menunummer }}" required>
    </div>

    <div class="form-group">
        <label for="menu_toevoeging">Menu Toevoeging</label>
        <input type="text" class="form-control" name="menu_toevoeging" value="{{ $menu->menu_toevoeging }}">
    </div>

    <div class="form-group">
        <label for="naam">Naam</label>
        <input type="text" class="form-control" name="naam" value="{{ $menu->naam }}" required>
    </div>

    <div class="form-group">
        <label for="price">Prijs</label>
        <input type="text" class="form-control" name="price" value="{{ $menu->price }}" required>
    </div>

    <div class="form-group">
        <label for="soortgerecht">Soortgerecht</label>
        <input type="text" class="form-control" name="soortgerecht" value="{{ $menu->soortgerecht }}" required>
    </div>

    <div class="form-group">
        <label for="beschrijving">Beschrijving</label>
        <textarea class="form-control" name="beschrijving">{{ $menu->beschrijving }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Opslaan</button>
</form>
<!-- @endsection -->
