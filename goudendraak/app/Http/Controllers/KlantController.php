<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class KlantController extends Controller
{
    public function index()
    {
        $menus = Menu::all();

        return view('klant-tablet.index', ['menus' => $menus]);
    }

    public function store(Request $request)
    {        
         $validatedData = $request->validate([
            'id' => 'required|integer|exists:menu,id',
        ]);

        $item = Menu::find($validatedData['id']);

        $cart = Session::get('cart', []);

        $cart[$item->id] = [
            'name' => $item->naam,
            'price' => $item->price,
            'description' => $item->beschrijving,
            'quantity' => ($cart[$item->id]['quantity'] ?? 0) + 1,
        ];

        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Item toegevoegd aan de winkelwagen!');
    }

    public function cartItemCount()
    {
        $cart = Session::get('cart', []);
        $count = array_sum(array_column($cart, 'quantity'));

        return response()->json(['count' => $count]);
    }

    public function cartIndex()
    {
        $cart = Session::get('cart', []);   
        return view('klant-tablet.cart', compact('cart'));
    }

    public function updateCart(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:menu,id',
            'quantity' => 'required|integer|min:1|max:8',
        ]);

        $cart = Session::get('cart', []);

        if (isset($cart[$validatedData['id']])) {
            $cart[$validatedData['id']]['quantity'] = $validatedData['quantity'];
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.cart')->with('success', 'Winkelwagen bijgewerkt!');
    }

    public function removeItem(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:menu,id',
        ]);

        $cart = Session::get('cart', []);

        if (isset($cart[$validatedData['id']])) {
            unset($cart[$validatedData['id']]);
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.cart')->with('success', 'Item verwijderd uit winkelwagen!');
    }

}
