<x-app-layout>
    <div style="padding: 20px;">        
        <form method="GET" action="{{ route('paginas.menu') }}" style="margin-bottom: 40px; display: flex; align-items: center; justify-content: center;">
            <input type="text" name="search" placeholder="@lang('public.Zoeken')..." value="{{ request('search') }}" style="margin-right: 10px; padding: 5px 10px; border: 2px solid yellow; border-radius: 5px; background-color: white; color: yellow;">
            
            <select name="filter" onchange="this.form.submit()" style="margin-right: 10px; padding: 5px 10px; border: 2px solid yellow; border-radius: 5px; background-color: red; color: yellow;">
                <option value="">@lang('public.Filter')</option>
                <option value="liked" {{ request('filter') == 'liked' ? 'selected' : '' }}>@lang('public.Gelikte Items')</option>
                <option value="not_liked" {{ request('filter') == 'not_liked' ? 'selected' : '' }}>@lang('public.Niet gelikte Items')</option>
            </select>
            
            <select name="sort" onchange="this.form.submit()" style="margin-right: 10px; padding: 5px 10px; border: 2px solid yellow; border-radius: 5px; background-color: red; color: yellow;">
                <option value="">@lang('public.Sorteren')</option>
                <option value="alphabetical" {{ request('sort') == 'alphabetical' ? 'selected' : '' }}>@lang('public.Alfabetisch')</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>@lang('public.Prijs oplopend')</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>@lang('public.Prijs Aflopend')</option>
                <option value="liked" {{ request('sort') == 'liked' ? 'selected' : '' }}>@lang('public.Favorieten')</option>
            </select>
            
            <button type="submit" style="padding: 5px 15px; border: 2px solid yellow; border-radius: 5px; background-color: red; color: yellow;">@lang('public.Zoek')</button>
        </form>



        <table style="width: 95%; color: white;">
            <thead>
                <tr>
                    <th>Menu Nummer</th>
                    <th>Naam</th>
                    <th>Prijs</th>
                    <th>Type</th>
                    <th>Omschrijving</th>
                    <th>Favoriet</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menu as $item)
                    <tr>
                        @if(!empty($item->menunummer))
                            <td>{{ $item->menunummer }}</td>
                        @else
                            <td>x</td>
                        @endif
                            <td>@lang('public.' . $item->naam)</td>
                            <td>{{ $item->price }}</td>
                            <td>@lang('public.' . $item->soortgerecht)</td>
                        @if( !empty($item->beschrijving) )
                            <td>@lang('public.' . $item->beschrijving)</td>
                        @else 
                            <td>@lang('public.beschrijving1')</td>
                        @endif
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
