<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Gerecht</title>
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

        .error-container {
        border: 1px solid #dc3545;
        border-radius: 5px;
        background-color: #f8d7da;
        color: #721c24;
        padding: 15px 20px;
        margin-bottom: 20px;
        text-align: center;

    }

    .error-header {
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .error-list {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    .error-list li {
        margin-bottom: 5px;
        padding-left: 20px;
        position: relative;
    }

    .error-list li:before {
        content: '⚠';
        color: #dc3545;
        position: absolute;
        left: 0;
    }
    </style>
</head>
<body>
@if ($errors->any())
    <div class="error-container">        
        <ul class="error-list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1>Nieuw Gerecht</h1>

<form action="{{ route('admin.menu.store') }}" method="POST">
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
        <textarea id="beschrijving" class="form-control" name="beschrijving"></textarea>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-success">Toevoegen</button>
        <a href="{{ route('admin.menu') }}" class="btn btn-secondary">Annuleren</a>
    </div>
</form>

</body>
</html>
