<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class KassaController extends Controller
{
    public function index(Request $request)
    {
        $query = Menu::query();

        if ($request->has('search')) {
            $query->where('naam', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('menunummer', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->has('category') && $request->input('category') != '') {
            $query->where('soortgerecht', $request->input('category'));
        }

        $menu = $query->paginate(10);

        // Assuming categories are predefined, you can fetch them from the Menu model or hardcode them
        $categories = Menu::select('soortgerecht')->distinct()->get();

        return view('kassa.index', [
            'menu' => $menu,
            'categories' => $categories
        ]);
    }
}
