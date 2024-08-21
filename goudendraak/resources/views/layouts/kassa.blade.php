<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kassa</title>
</head>
<style>
    body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .navbar {
            background-color: #343a40;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
        }

        .navbar h1 {
            margin: 0;
            font-size: 24px;
        }

        .navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar ul li {
            margin-left: 20px;
        }

        .navbar ul li a {
            color: #fff;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .navbar ul li a:hover {
            background-color: #495057;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }        
</style>
<body>


    <nav class="navbar">        
        <ul>
            <li><a href="{{ route('admin.sales') }}">All Sales</a></li>
            <li><a href="{{ route('admin.sales.today') }}">Today's Sales</a></li>
            <li><a href="{{ route('admin.menu') }}">Menu</a></li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>