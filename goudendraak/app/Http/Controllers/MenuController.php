<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Exception;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        try {
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
        } catch (Exception $e) {
            \Log::error('Fout in de index-functie: ' . $e->getMessage());
            return response()->view('errors.general', [], 500);
        }
    }

    public function create()
    {
        try {
            return view('admin.menu.create');
        } catch (Exception $e) {
            \Log::error('Fout in de create-functie: ' . $e->getMessage());
            return response()->view('errors.general', [], 500);
        }
    }

    public function store(Request $request)
    {
        try {
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
        } catch (Exception $e) {
            \Log::error('Fout in de store-functie: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is iets misgegaan bij het toevoegen van het gerecht.');
        }
    }

    public function edit($id)
    {
        try {
            $menu = Menu::findOrFail($id);
            return view('admin.menu.edit', compact('menu'));
        } catch (Exception $e) {
            \Log::error('Fout in de edit-functie: ' . $e->getMessage());
            return redirect()->route('admin.menu')->withErrors('Er is iets misgegaan bij het openen van de bewerkingspagina.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'menunummer' => 'required|integer',
                'naam' => 'required',
                'price' => 'required|numeric',
                'soortgerecht' => 'required',
            ]);

            $menu = Menu::findOrFail($id);
            $menu->update($request->all());

            return redirect()->route('admin.menu')->with('success', 'Gerecht aangepast');
        } catch (Exception $e) {
            \Log::error('Fout in de update-functie: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is iets misgegaan bij het updaten van het gerecht.');
        }
    }

    public function destroy($id)
    {
        try {
            $menu = Menu::findOrFail($id);
            $menu->delete();

            return redirect()->route('admin.menu')->with('success', 'Gerecht verwijderd');
        } catch (Exception $e) {
            \Log::error('Fout in de destroy-functie: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is iets misgegaan bij het verwijderen van het gerecht.');
        }
    }
}
