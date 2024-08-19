<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f6f9;
        }

        h1 {
            font-size: 28px;
            color: #343a40;
            text-align: center;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-warning {
            background-color: #ffc107;
            color: white;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        th, td {
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        tbody tr {
            transition: background-color 0.3s ease;
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

        /* Responsive */
        @media (max-width: 768px) {
            th, td {
                padding: 10px;
            }

            .btn {
                font-size: 14px;
                padding: 8px 16px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

<h1>Menu</h1>
<a href="{{ route('admin.menu.create') }}" class="btn btn-primary">Nieuw Gerecht</a>

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
    {{ $menus->links() }}
</div>

</body>
</html>
