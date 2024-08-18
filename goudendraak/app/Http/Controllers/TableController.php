<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Visitor;
use App\Models\Reservation;
use Illuminate\Support\Facades\Log;


class TableController extends Controller
{
    public function index()
    {
        $tables = Table::orderBy('occupied', 'asc')->get();
        return view('ober.index', compact('tables'));
    }

    public function reserve($id)
    {
        $table = Table::findOrFail($id);
        return view('ober.reserve', compact('table'));
    }

    public function storeReservation(Request $request, $id)
    {
        $table = Table::findOrFail($id);

        // Create a new reservation
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
    }



    public function finalizePayment($id)
    {   
        $table = Table::findOrFail($id);
        
        $table->round = 1;
        $table->deluxe_menu = false;
        $table->customer_amount = 0;
        $table->occupied = false;
        $table->total = 0.00;
        $table->save();

        return redirect()->route('tables.index');
    }

}
