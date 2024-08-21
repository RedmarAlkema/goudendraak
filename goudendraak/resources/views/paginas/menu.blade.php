<x-app-layout>
    <div style="padding: 20px;">
        <h1 style="color: yellow;">Menu</h1>       

        <form method="GET" action="{{ route('paginas.menu') }}" style="margin-bottom: 20px;">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" style="margin-right: 10px;">
            <select name="filter" onchange="this.form.submit()">
                <option value="">Filter</option>
                <option value="liked" {{ request('filter') == 'liked' ? 'selected' : '' }}>Liked Items</option>
                <option value="not_liked" {{ request('filter') == 'not_liked' ? 'selected' : '' }}>Not Liked Items</option>
            </select>
            <select name="sort" onchange="this.form.submit()">
                <option value="">Sort By</option>
                <option value="alphabetical" {{ request('sort') == 'alphabetical' ? 'selected' : '' }}>Alphabetical</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price Ascending</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price Descending</option>
                <option value="liked" {{ request('sort') == 'liked' ? 'selected' : '' }}>Liked</option>
            </select>
            <button type="submit">Apply</button>
        </form>

        <table style="width: 100%; color: white;">
            <thead>
                <tr>
                    <th>Menu Number</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Like</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menu as $item)
                    <tr>
                        <td>{{ $item->menunummer }}</td>
                        <td>{{ $item->naam }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->soortgerecht }}</td>
                        <td>{{ $item->beschrijving }}</td>
                        <td>
                            <form method="POST" action="{{ route('menu.like', $item->id) }}">
                                @csrf
                                <button type="submit" style="background: none; border: none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="{{ in_array($item->id, session('liked', [])) ? '#FFD700' : 'none' }}" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" style="width: 24px; height: 24px;">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <ul class="pagination">
        {{ $menu->links() }}
    </ul>
       
    </div>
</x-app-layout>
