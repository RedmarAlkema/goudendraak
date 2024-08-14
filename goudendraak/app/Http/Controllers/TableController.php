<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::all()->orderBy('occupied');
        return view('ober.index', compact('tables'));
    }

    public function reserve($id)
    {
        $table = Table::findOrFail($id);

        // Hier zou je logica toevoegen om de tafel te reserveren
        // Voor nu verwijzen we gewoon door naar een reserveringspagina
        return view('tables.reserve', compact('table'));
    }
}
