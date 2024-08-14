<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellen</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/app.js','resources/css/app.css'])
</head>
<body>
    <div id="app">
        <shopping-cart-component></shopping-cart-component>
        <menu-component :menus="{{ json_encode($menus) }}"></menu-component>
    </body>
</html>
