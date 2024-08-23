<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bedankt voor uw bezoek!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column justify-content-center align-items-center vh-100">
    <div class="text-center">
        <h1 class="mb-4">Bedankt voor uw bezoek!</h1>
        <p class="mb-4">We hopen dat u genoten heeft van uw maaltijd.</p>
        <p class="h4">Uw totale bedrag is: €{{ number_format($total, 2) }}</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
