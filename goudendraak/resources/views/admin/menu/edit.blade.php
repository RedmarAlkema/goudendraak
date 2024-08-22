@extends('layouts.admin')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Bewerk Gerecht</h1>

    <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="menunummer">Menunummer</label>
            <input type="number" id="menunummer" class="form-control" name="menunummer" value="{{ $menu->menunummer }}" required>
        </div>

        <div class="form-group">
            <label for="menu_toevoeging">Menu Toevoeging</label>
            <input type="text" id="menu_toevoeging" class="form-control" name="menu_toevoeging" value="{{ $menu->menu_toevoeging }}">
        </div>

        <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" id="naam" class="form-control" name="naam" value="{{ $menu->naam }}" required>
        </div>

        <div class="form-group">
            <label for="price">Prijs</label>
            <input type="text" id="price" class="form-control" name="price" value="{{ $menu->price }}" required>
        </div>

        <div class="form-group">
            <label for="soortgerecht">Soortgerecht</label>
            <input type="text" id="soortgerecht" class="form-control" name="soortgerecht" value="{{ $menu->soortgerecht }}" required>
        </div>

        <div class="form-group">
            <label for="beschrijving">Beschrijving</label>
            <textarea id="beschrijving" class="form-control" name="beschrijving" rows="4">{{ $menu->beschrijving }}</textarea>
        </div>

        <div class="form-actions text-center mt-4">
            <button type="submit" class="btn btn-success">Opslaan</button>
            <a href="{{ route('admin.menu') }}" class="btn btn-secondary">Annuleren</a>
        </div>
    </form>
</div>

@endsection