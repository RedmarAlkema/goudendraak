<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use \App\Models\Table;
use \App\Models\Order;
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

        return redirect->route('cart.index');
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

    public function storeTableNumber(Request $request)
    {
        $validatedData = $request->validate([
            'table_number' => 'required|integer|min:1',
        ]);

        $table = Table::where('table_number', $validatedData['table_number'])
                    ->orderBy('id', 'desc')
                    ->first();

        if ($table) {
            $round = $table->round;
            Session::put('table', $table);
            Session::put('round', $round);
            return redirect()->back()->with('success', 'Tafelnummer opgeslagen en round ingesteld!');
        } else {
            return redirect()->back()->with('error', 'Tafel is nog niet geregistreerd.');
            Session::put('round', '1');
        }
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

    public function checkout()
    {
        $tableInSession = Session::get('table');
        $cart = Session::get('cart');

        if (!$tableInSession) {
            return redirect()->back()->with('error', 'Geen tafel gevonden.');
        }

        $table = Table::where('table_number', $tableInSession->table_number)->first();

        if (!$table) {
            return redirect()->back()->with('error', 'Geen tafel gevonden.');
        }

        Session::put('table', $table);

        \DB::transaction(function() use ($table, $cart) {
            foreach ($cart as $menuId => $item) {
                for ($i = 0; $i < $item['quantity']; $i++) {
                    Order::create([
                        'table_id' => $table->id,
                        'reservation_id' => $table->reservation_id,
                        'menu_id' => $menuId,
                        'time' => now(),                        
                    ]);
                }
            }

            $table->round += 1;
            $currRound = $table->round;          
            
            $total = \DB::table('orders')
                ->join('menu', 'orders.menu_id', '=', 'menu.id')                
                ->where('orders.table_id', $table->id)
                ->where('orders.reservation_id', $table->reservation_id)
                ->sum('menu.price');
            
            $table->total = $total;
            $table->save();

            Session::forget(['cart', 'round']);
            Session::put('round', $table->round);
            Session::put('table', $table);

            if ($currRound > 5) {
                $redirectToThankYou = true;
            }
        });

        $endTime = now()->addMinutes(10);
        Session::put('checkout_end_time', $endTime);

        if ($table->round > 5) {
            return redirect()->route('cart.thankyou');
        }
        return redirect()->route('cart.index')->with('success', 'Bestelling succesvol afgerond!');
    }



    public function thankYou()
    {
        $table = Session::get('table');

        if (!$table) {
            return redirect()->route('cart.index')->with('error', 'Geen tafel gevonden.');
        }

        $total = $table->total;

        Session::forget(['cart', 'round','table']);;

        return view('klant-tablet.bye', compact('total'));
    }

}