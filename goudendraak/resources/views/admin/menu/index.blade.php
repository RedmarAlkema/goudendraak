@extends('layouts.admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    @vite(['resources/js/app.js'])
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-warning {
            background-color: #ffc107;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .search-bar {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search-bar input[type="text"] {
            width: 70%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-bar button {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-bar button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            text-align: left;
            padding: 7px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        td form {
            display: inline;
        }

        /* Pagination Styles */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            font-family: Arial, sans-serif;
        }

        .pagination li {
            list-style: none;
            margin: 0 5px;
        }

        .pagination li a, .pagination li span {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .pagination li a:hover {
            background-color: #0056b3;
            color: white;
        }

        .pagination .active span {
            background-color: #0056b3;
            cursor: default;
        }

        .pagination .disabled span {
            background-color: #e9ecef;
            color: #6c757d;
            cursor: not-allowed;
        }

        .pagination li a svg, .pagination li span svg {
            vertical-align: middle;
            width: 18px;
            height: 18px;
        }
    </style>
</head>
<body>

<h1>Menu</h1>

<div class="search-bar">
    <form action="{{ route('admin.menu') }}" method="GET">
        <input type="text" name="search" placeholder="Zoek op naam, menunummer of soortgerecht" value="{{ request()->query('search') }}">
        <button type="submit">Zoeken</button>
    </form>
    <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">Nieuw Gerecht</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Menunummer</th>
            <th>Naam</th>
            <th>Prijs</th>
            <th>Soortgerecht</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menus as $menu)
        <tr>
            <td>{{ $menu->menunummer }} {{ $menu->menu_toevoeging }}</td>
            <td>{{ $menu->naam }}</td>
            <td>€ {{ number_format($menu->price, 2, ',', '.') }}</td>
            <td>{{ $menu->soortgerecht }}</td>
            <td>
                <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-warning">Bewerken</a>
                <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Verwijderen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="pagination">
    {{ $menus->appends(['search' => request()->query('search')])->links() }}
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
@endsection