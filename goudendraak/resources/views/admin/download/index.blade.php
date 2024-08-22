@extends('layouts.admin')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Sales List</h1>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <form action="{{ route('admin.sales') }}" method="GET" class="form-inline">
            <input type="text" name="search" class="form-control mr-2" placeholder="@lang('Zoeken...')" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">@lang('Zoeken')</button>
        </form>
        <a href="{{ route('admin.export') }}" class="btn btn-success">@lang('Download sales van vandaag')</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>@lang('Menu Naam')</th>
                <th>@lang('Menu Nummer')</th>
                <th>@lang('Prijs')</th>
                <th>@lang('Aantal')</th>
                <th>@lang('Verkoopdatum')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->naam }}</td>
                    <td>{{ $sale->nummer }}</td>
                    <td>{{ $sale->price }}</td>
                    <td>{{ $sale->amount }}</td>
                    <td>{{ \Carbon\Carbon::parse($sale->saleDate)->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $sales->links('pagination::bootstrap-4') }}
    </div>
</div>

@endsection