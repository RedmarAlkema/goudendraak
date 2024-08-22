<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $menus = Menu::query()
            ->when($search, function ($query, $search) {
                return $query->where('naam', 'like', "%{$search}%")
                             ->orWhere('menunummer', 'like', "%{$search}%")
                             ->orWhere('soortgerecht', 'like', "%{$search}%");
            })
            ->orderBy('menunummer')
            ->paginate(10);

        return view('admin.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'menunummer' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) use ($request) {
                    if (Menu::where('menunummer', $value)
                            ->where('menu_toevoeging', $request->menu_toevoeging)
                            ->exists()) {
                        $fail('Het menunummer en menu toevoeging moeten uniek zijn.');
                    }
                },
            ],
            'menu_toevoeging' => [
                'nullable',
                'string',
                'max:255',
            ],
            'naam' => 'required|string|max:255',
            'price' => 'required|numeric',
            'soortgerecht' => 'required|string|max:255',
            'beschrijving' => 'nullable|string',
        ]);
    
        Menu::create($request->all());
    
        return redirect()->route('admin.menu')->with('success', 'Gerecht succesvol toegevoegd.');
    }
    


    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'menunummer' => 'required|integer',
            'naam' => 'required',
            'price' => 'required|numeric',
            'soortgerecht' => 'required',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($request->all());

        return redirect()->route('admin.menu')->with('success', 'Gerecht aangepast');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('admin.menu')->with('success', 'Gerecht verwijderd');
    }
}

