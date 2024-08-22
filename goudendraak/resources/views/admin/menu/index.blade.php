@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Menu</h1>

    <div class="d-flex justify-content-between mb-4">
        <form action="{{ route('admin.menu') }}" method="GET" class="form-inline">
            <input type="text" name="search" class="form-control mr-2" placeholder="@lang('Zoek op naam, menunummer of soortgerecht')" value="{{ request()->query('search') }}">
            <button type="submit" class="btn btn-primary">@lang('Zoeken')</button>
        </form>
        <a href="{{ route('admin.menu.create') }}" class="btn btn-success">@lang('Nieuw Gerecht')</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>@lang('Menunummer')</th>
                <th>@lang('Naam')</th>
                <th>@lang('Prijs')</th>
                <th>@lang('Soortgerecht')</th>
                <th>@lang('Acties')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->menunummer }} {{ $menu->menu_toevoeging }}</td>
                <td>{{ $menu->naam }}</td>
                <td>€{{ number_format($menu->price, 2, ',', '.') }}</td>
                <td>{{ $menu->soortgerecht }}</td>
                <td>
                    <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-primary">@lang('Bewerken')</a>
                    <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">@lang('Verwijderen')</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $menus->appends(['search' => request()->query('search')])->links('pagination::bootstrap-4') }}
    </div>
</div>

@endsection