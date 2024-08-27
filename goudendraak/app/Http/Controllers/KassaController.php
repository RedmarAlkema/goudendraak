<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use Exception;

class KassaController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Menu::query();

            if ($request->has('search')) {
                $query->where('naam', 'like', '%' . $request->input('search') . '%')
                      ->orWhere('menunummer', 'like', '%' . $request->input('search') . '%');
            }

            if ($request->has('category') && $request->input('category') != '') {
                $query->where('soortgerecht', $request->input('category'));
            }

            $menu = $query->paginate(10);
            $categories = Menu::select('soortgerecht')->distinct()->get();

            return view('kassa.index', [
                'menu' => $menu,
                'categories' => $categories
            ]);
        } catch (Exception $e) {
            \Log::error('Fout in de index-functie: ' . $e->getMessage());
            return response()->view('errors.general', [], 500);
        }
    }

    public function orders(Request $request)
    {
        try {
            $query = Order::whereDate('time', now()->format('Y-m-d'));

            if ($request->has('table_id')) {
                $query->where('table_id', $request->input('table_id'));
            }

            $orders = $query->paginate(10);

            $mostUsedComments = Order::select('comment')
                ->whereNotNull('comment')
                ->groupBy('comment')
                ->orderByRaw('COUNT(*) DESC')
                ->limit(10)
                ->pluck('comment');

            return view('kassa.orders', [
                'orders' => $orders,
                'mostUsedComments' => $mostUsedComments
            ]);
        } catch (Exception $e) {
            \Log::error('Fout in de orders-functie: ' . $e->getMessage());
            return response()->view('errors.general', [], 500);
        }
    }

    public function addComment(Request $request, $id)
    {
        try {
            $request->validate([
                'comment' => 'required|string|max:255',
            ]);

            $order = Order::findOrFail($id);
            $order->comment = $request->input('comment');
            $order->save();

            return redirect()->back()->with('success', 'Comment added successfully!');
        } catch (Exception $e) {
            \Log::error('Fout in de addComment-functie: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is iets misgegaan bij het toevoegen van de opmerking.');
        }
    }
}