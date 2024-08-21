<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;

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

    public function orders(Request $request)
    {
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
    }

    public function addComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $order = Order::findOrFail($id);
        $order->comment = $request->input('comment');
        $order->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
