<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserveren voor Tafel {{ $table->table_number }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Reserveren voor Tafel {{ $table->table_number }}</h1>
        <p>Deze tafel heeft ruimte voor maximaal {{ $table->space }} personen.</p>
        <form action="{{ route('tables.reserve.store', $table->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="deluxe_menu" class="form-label">Deluxe Menu:</label>
                <select name="deluxe_menu" id="deluxe_menu" class="form-select">
                    <option value="0">Nee</option>
                    <option value="1">Ja</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="customer_amount" class="form-label">Aantal Klanten:</label>
                <input type="number" name="customer_amount" id="customer_amount" class="form-control" min="1" max="{{ min($table->space, 8) }}" required>
            </div>

            <div id="people-container" class="mb-3">
                <h3>Personen:</h3>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('tables.index') }}" class="btn btn-secondary">Terug</a>
                <button type="submit" class="btn btn-primary">Reserveren</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('customer_amount').addEventListener('input', function() {
            let customerAmount = parseInt(this.value);
            let peopleContainer = document.getElementById('people-container');
            let maxPeople = {{ min($table->space, 8) }};

            if (customerAmount > maxPeople) {
                this.value = maxPeople;
                customerAmount = maxPeople;
            }

            peopleContainer.innerHTML = '';

            for (let i = 0; i < customerAmount; i++) {
                let newPersonGroup = document.createElement('div');
                newPersonGroup.classList.add('mb-3');
                newPersonGroup.innerHTML = `
                    <label class="form-label">Leeftijd Persoon ${i + 1}:</label>
                    <input type="number" name="ages[]" class="form-control" min="0" max="120" required>
                `;
                peopleContainer.appendChild(newPersonGroup);
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
