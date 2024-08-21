@extends('layouts.admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales List</title>
    <style>
        body {
            font-family: Arial, sans-serif;            
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .search-container {
            display: flex;
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 250px;
        }

        .search-container button {
            padding: 8px 12px;
            font-size: 14px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f8f8f8;
            color: #555;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination a {
            color: #007bff;
            text-decoration: none;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .pagination a:hover {
            background-color: #007bff;
            color: #fff;
        }

        .pagination .active a {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination .disabled a {
            color: #ccc;
            pointer-events: none;
            border-color: #ddd;
        }

        .btn-download {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Sales List</h1>

    <div class="search-container">
        <form action="{{ route('admin.sales') }}" method="GET">
            <input type="text" name="search" placeholder="Zoeken..." value="{{ request('search') }}">
            <button type="submit">Zoeken</button>
        </form>
    </div>

    <a href="{{ route('admin.export') }}" class="btn-download">Download sales van vandaag</a>

    <table>
        <thead>
            <tr>
                <th>Menu Naam</th>
                <th>Menu Nummer</th>
                <th>Prijs</th>
                <th>Aantal</th>
                <th>Verkoopdatum</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->naam }}</td>
                    <td>{{ $sale->nummer }}</td>
                    <td>{{ $sale->price }}</td>
                    <td>{{ $sale->amount }}</td>
                    <td>{{ \Carbon\Carbon::parse($sale->saleDate)->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination links -->
    <ul class="pagination">
        {{ $sales->links('pagination::bootstrap-4') }}
    </ul>
</div>

</body>
</html>
@endsection
