<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkelwagen</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Winkelwagen</h1>

        <a href="{{ route('cart.index') }}" class="btn btn-secondary mb-4">Terug naar Bestellen</a>
       
        @if(count($cart) > 0)
            @foreach($cart as $itemId => $item)
                <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                    <div>
                        <h4 class="mb-1">{{ $item['name'] }}</h4>
                        <p class="mb-0">€{{ number_format($item['price'], 2) }}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <form action="{{ route('cart.update') }}" method="POST" class="d-flex align-items-center me-3">
                            @csrf
                            <input type="hidden" name="id" value="{{ $itemId }}">
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" class="form-control text-center me-2" style="width: 60px;" min="1" max="8">
                            <button type="submit" class="btn btn-outline-primary">Bijwerken</button>
                        </form>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $itemId }}">
                            <button type="submit" class="btn btn-danger">Verwijderen</button>
                        </form>
                    </div>
                </div>
            @endforeach
                        
            @if(!Session::has('checkout_end_time') || now()->greaterThan(Session::get('checkout_end_time')))
                <div class="text-center mt-4">
                    <form action="{{ route('cart.checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-lg">Uitchecken</button>
                    </form>
                </div>
            @else
                <div class="text-center mt-4">
                    <p class="text-danger fs-4">Je kunt weer bestellen over <span id="time"></span> minuten.</p>
                </div>
            @endif
        @else
            <div class="alert alert-info mt-4">
                Je winkelwagen is leeg of je moet wachten tot de timer is afgelopen.
            </div>
        @endif
    </div>

    <script>
        function startTimer(duration, display) {
            let timer = duration, minutes, seconds;
            const interval = setInterval(() => {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(interval);
                    location.reload(); // Refresh de pagina als de tijd om is
                }
            }, 1000);
        }

        window.onload = function () {
            @if(Session::has('checkout_end_time') && Session::get('checkout_end_time') !== null)
                const endTime = new Date("{{ Session::get('checkout_end_time')->toIso8601String() }}").getTime();
                const now = new Date().getTime();
                const remainingTime = (endTime - now) / 1000;

                if (remainingTime > 0) {
                    const display = document.querySelector('#time');
                    startTimer(remainingTime, display);
                }
            @else
                console.error("checkout_end_time is not set in the session.");
            @endif
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
