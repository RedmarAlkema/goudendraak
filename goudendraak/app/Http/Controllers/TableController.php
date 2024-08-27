<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Order;
use App\Models\Visitor;
use App\Models\Sale;
use App\Models\Reservation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;

class TableController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Table::orderBy('occupied', 'asc');

            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where('table_number', 'like', '%' . $search . '%');
            }

            $tables = $query->get();

            return view('ober.index', compact('tables'));
        } catch (Exception $e) {
            Log::error('Fout in de index-functie: ' . $e->getMessage());
            return response()->view('errors.general', [], 500);
        }
    }

    public function reserve($id)
    {
        try {
            $table = Table::findOrFail($id);
            return view('ober.reserve', compact('table'));
        } catch (Exception $e) {
            Log::error('Fout in de reserve-functie: ' . $e->getMessage());
            return redirect()->route('tables.index')->withErrors('Er is iets misgegaan bij het laden van de reserveringspagina.');
        }
    }

    public function storeReservation(Request $request, $id)
    {
        try {
            $table = Table::findOrFail($id);

            $reservation = new Reservation([
                'table_id' => $table->id,
            ]); 
            $reservation->save();

            $lastReserveId = $reservation->id;

            $table->deluxe_menu = $request->input('deluxe_menu');
            $table->customer_amount = $request->input('customer_amount');
            $table->occupied = true;
            $table->round = 1;
            $table->reservation_id = $lastReserveId; 
            $table->save();

            Log::info($lastReserveId);

            $ages = $request->input('ages');
            foreach ($ages as $age) {
                Visitor::create([
                    'leeftijd' => $age,
                    'table_id' => $table->id,
                    'reserve_id' => $lastReserveId, 
                ]);
            }

            return redirect()->route('tables.index')->with('success', 'Reservering succesvol gemaakt voor tafel ' . $table->table_number);
        } catch (Exception $e) {
            Log::error('Fout in de storeReservation-functie: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is iets misgegaan bij het maken van de reservering.');
        }
    }

    public function finalizePayment($id)
    {   
        try {
            $table = Table::findOrFail($id);
            
            $table->round = 1;
            $table->deluxe_menu = false;
            $table->customer_amount = 0;
            $table->occupied = false;
            $table->total = 0.00;
            $table->save();

            $orders = Order::where('reservation_id', $table->reservation_id)
                ->select('menu_id', DB::raw('count(*) as amount'))
                ->groupBy('menu_id')
                ->get();

            foreach($orders as $order) {
                Sale::create([
                    'itemId' => $order->menu_id,
                    'amount' => $order->amount,  
                    'saleDate' => now(),  
                ]);
            }

            return redirect()->route('tables.index');
        } catch (Exception $e) {
            Log::error('Fout in de finalizePayment-functie: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is iets misgegaan bij het afronden van de betaling.');
        }
    }
}