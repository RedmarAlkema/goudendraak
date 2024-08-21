@extends('layouts.kassa')

@section('content')
    <h1 class="text-center mb-4">Kassa - Bestellingen van Vandaag</h1>

    <form method="GET" action="{{ route('kassa.orders') }}" class="row mb-4">
        <div class="col-md-4">
            <input type="text" name="table_id" placeholder="Filter op tafel ID" value="{{ request('table_id') }}" class="form-control">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Menu ID</th>
                <th>Tafel ID</th>
                <th>Reservatie ID</th>
                <th>Tijd</th>
                <th>Opmerking</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->menu_id }}</td>
                    <td>{{ $order->table_id }}</td>
                    <td>{{ $order->reservation_id }}</td>
                    <td>{{ $order->time }}</td>
                    <td>{{ $order->comment }}</td>
                    <td>
                        <form method="POST" action="{{ route('kassa.orders.comment', $order->id) }}">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="comment" class="form-control" placeholder="Voeg een opmerking toe" value="{{ $order->comment }}">
                                <button type="submit" class="btn btn-primary">Opslaan</button>
                            </div>
                            <div class="mt-2">
                                <label for="mostUsedComments">Selecteer een veelgebruikte opmerking:</label>
                                <select id="mostUsedComments" class="form-select" onchange="this.form.comment.value = this.value">
                                    <option value="">Selecteer...</option>
                                    @foreach($mostUsedComments as $comment)
                                        <option value="{{ $comment }}">{{ $comment }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
@endsection
