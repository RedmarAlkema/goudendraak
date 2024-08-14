<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserveren</title>
</head>
<body>
    <div class="container">
        <h1>Reserveren voor Tafelnummer: {{ $table->table_number }}</h1>
        <!-- Hier zou je een reserveringsformulier of verdere logica kunnen toevoegen -->
        <p>Hier komt je reserveringsformulier of verdere logica voor tafel {{ $table->table_number }}.</p>
    </div>
</body>
</html>
