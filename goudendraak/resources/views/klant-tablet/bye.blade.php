<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bedankt voor uw bezoek!</title>
    <style>
        body {
            text-align: center;
            margin-top: 50px;
            font-family: Arial, sans-serif;
        }
        .total {
            font-size: 24px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Bedankt voor uw bezoek!</h1>
    <p>We hopen dat u genoten heeft van uw maaltijd.</p>
    <p class="total">Uw totale bedrag is: €{{ number_format($total, 2) }}</p>
</body>
</html>
