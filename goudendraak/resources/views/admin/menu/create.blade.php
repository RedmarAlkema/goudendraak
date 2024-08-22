@extends('layouts.admin')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Nieuw Gerecht</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Er is iets misgegaan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.menu.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
        @csrf

        <div class="form-group">
            <label for="menunummer">Menunummer</label>
            <input type="number" id="menunummer" class="form-control" name="menunummer" required>
        </div>

        <div class="form-group">
            <label for="menu_toevoeging">Menu Toevoeging</label>
            <input type="text" id="menu_toevoeging" class="form-control" name="menu_toevoeging">
        </div>

        <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" id="naam" class="form-control" name="naam" required>
        </div>

        <div class="form-group">
            <label for="price">Prijs</label>
            <input type="text" id="price" class="form-control" name="price" required>
        </div>

        <div class="form-group">
            <label for="soortgerecht">Soortgerecht</label>
            <input type="text" id="soortgerecht" class="form-control" name="soortgerecht" required>
        </div>

        <div class="form-group">
            <label for="beschrijving">Beschrijving</label>
            <textarea id="beschrijving" class="form-control" name="beschrijving" rows="4"></textarea>
        </div>

        <div class="form-actions text-center mt-4">
            <button type="submit" class="btn btn-success">Toevoegen</button>
            <a href="{{ route('admin.menu') }}" class="btn btn-secondary">Annuleren</a>
        </div>
    </form>
</div>

@endsection