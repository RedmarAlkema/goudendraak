<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('menunummer')->get();
        return view('admin.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'menunummer' => 'required|integer',
            'naam' => 'required',
            'price' => 'required|numeric',
            'soortgerecht' => 'required',
        ]);

        Menu::create($request->all());

        return redirect()->route('admin.menu')->with('success', 'Gerecht toegevoegd');
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

