<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserveren voor Tafel {{ $table->table_number }}</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
        }
        .input-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .input-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .reserve-btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .reserve-btn:hover {
            background-color: #0056b3;
        }
        .person-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reserveren voor Tafel {{ $table->table_number }}</h1>
        <p>Deze tafel heeft ruimte voor maximaal {{ $table->space }} personen.</p>
        <form action="{{ route('tables.reserve.store', $table->id) }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="deluxe_menu">Deluxe Menu:</label>
                <select name="deluxe_menu" id="deluxe_menu">
                    <option value="0">Nee</option>
                    <option value="1">Ja</option>
                </select>
            </div>

            <div class="input-group">
                <label for="customer_amount">Aantal Klanten:</label>
                <input type="number" name="customer_amount" id="customer_amount" min="1" max="{{ min($table->space, 8) }}" required>
            </div>

            <div id="people-container">
                <h3>Personen:</h3>
            </div>

            <div class="input-group">
                <button type="submit" class="reserve-btn">Reserveren</button>
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
                newPersonGroup.classList.add('person-group');
                newPersonGroup.innerHTML = `
                    <label>Leeftijd Persoon ${i + 1}:</label>
                    <input type="number" name="ages[]" min="0" max="120" required>
                `;
                peopleContainer.appendChild(newPersonGroup);
            }
        });
    </script>
</body>
</html>
