<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewerk Gerecht</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }

        h1 {
            font-size: 28px;
            color: #343a40;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #495057;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
            color: #495057;
            background-color: #f8f9fa;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: #80bdff;
            outline: none;
            background-color: #fff;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #218838;
        }

        .btn-secondary {
            background-color: #6c757d;
            margin-left: 10px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .form-actions {
            text-align: center;
            margin-top: 20px;
        }

    </style>
</head>
<body>

<h1>Bewerk Gerecht</h1>

<form action="{{ route('admin.menu.update', $menu->id) }}" method="POST">
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
        <textarea id="beschrijving" class="form-control" name="beschrijving">{{ $menu->beschrijving }}</textarea>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-success">Opslaan</button>
        <a href="{{ route('admin.menu') }}" class="btn btn-secondary">Annuleren</a>
    </div>
</form>

</body>
</html>
