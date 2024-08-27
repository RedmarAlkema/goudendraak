<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Tafel;
use App\Models\Menu;
use App\Models\MenuProduct;
use App\Models\Keukenbon;
use Exception;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        try {
            $tafels = Tafel::all();
            return view('kassa.create-order', compact('tafels'));
        } catch (Exception $e) {
            \Log::error('Fout in de createOrder-functie: ' . $e->getMessage());
            return response()->view('errors.general', [], 500);
        }
    }

    public function storeOrder(Request $request)
    {
        try {
            $tafel = Tafel::findOrFail($request->input('tafel_id'));
            $order = new Order;
            $order->tafel_id = $tafel->id;
            $order->total_price = 0;
            $order->save();

            foreach ($request->input('menu_id', []) as $index => $menu_id) {
                $menu = Menu::findOrFail($menu_id);
                $aantal = $request->input('aantal')[$index];
                $order->total_price += $menu->price * $aantal;
                $order->save();

                MenuProduct::create([
                    'order_id' => $order->id,
                    'menu_id' => $menu->id,
                    'aantal' => $aantal,
                    'price' => $menu->price,
                ]);
            }

            $order->save();
            $keukenbon = new Keukenbon();
            $keukenbon->order_id = $order->id;
            $keukenbon->save();

            return redirect()->route('orders.index')->with('success', 'Order successfully created!');
        } catch (Exception $e) {
            \Log::error('Fout in de storeOrder-functie: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is iets misgegaan bij het aanmaken van de order.');
        }
    }

    public function showOrders()
    {
        try {
            $orders = Order::paginate(10);
            return view('kassa.show-orders', compact('orders'));
        } catch (Exception $e) {
            \Log::error('Fout in de showOrders-functie: ' . $e->getMessage());
            return response()->view('errors.general', [], 500);
        }
    }

    public function editOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            $tafels = Tafel::all();
            return view('kassa.edit-order', compact('order', 'tafels'));
        } catch (Exception $e) {
            \Log::error('Fout in de editOrder-functie: ' . $e->getMessage());
            return redirect()->route('orders.index')->withErrors('Er is iets misgegaan bij het bewerken van de order.');
        }
    }

    public function updateOrder(Request $request, $id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->tafel_id = $request->input('tafel_id');
            $order->save();

            return redirect()->route('orders.index')->with('success', 'Order successfully updated!');
        } catch (Exception $e) {
            \Log::error('Fout in de updateOrder-functie: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is iets misgegaan bij het updaten van de order.');
        }
    }

    public function deleteOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();

            return redirect()->route('orders.index')->with('success', 'Order successfully deleted!');
        } catch (Exception $e) {
            \Log::error('Fout in de deleteOrder-functie: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is iets misgegaan bij het verwijderen van de order.');
        }
    }
}
