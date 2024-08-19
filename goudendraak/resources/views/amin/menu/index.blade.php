<!-- @extends('layouts.admin')

@section('content') -->
<h1>Menu</h1>
<a href="{{ route('admin.menu.create') }}" class="btn btn-primary">Nieuw Gerecht</a>

<table class="table">
    <thead>
        <tr>
            <th>Menunummer</th>
            <th>Naam</th>
            <th>Prijs</th>
            <th>Soortgerecht</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menus as $menu)
        <tr>
            <td>{{ $menu->menunummer }}</td>
            <td>{{ $menu->naam }}</td>
            <td>{{ $menu->price }}</td>
            <td>{{ $menu->soortgerecht }}</td>
            <td>
                <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-warning">Bewerken</a>
                <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Verwijderen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- @endsection -->
