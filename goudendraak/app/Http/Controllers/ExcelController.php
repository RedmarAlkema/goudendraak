<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Exports\SalesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ExcelController extends Controller
{
    
    public function index(Request $request)
    {
        $query = $request->input('search');

        $salesQuery = Sale::select([
                'menu.naam',
                DB::raw("CONCAT(COALESCE(menu.menunummer, ''), ' ', COALESCE(menu.menu_toevoeging, '')) as nummer"),
                'menu.price',
                'sales.amount',
                'sales.saleDate'
            ])
            ->leftJoin('menu', 'sales.itemId', '=', 'menu.id')
            ->orderBy('sales.saleDate', 'desc');

        if ($query) {
            $salesQuery->where(function($q) use ($query) {
                $q->where('menu.naam', 'like', "%{$query}%")
                ->orWhere(DB::raw("CONCAT(COALESCE(menu.menunummer, ''), ' ', COALESCE(menu.menu_toevoeging, ''))"), 'like', "%{$query}%");

                if (is_numeric($query) && strlen($query) == 4) {
                    $q->orWhereYear('sales.saleDate', $query);
                }
            });
        }

        $sales = $salesQuery->paginate(10);

        return view('admin.download.index', ['sales' => $sales]);
    }

    public function today(Request $request)
    {
        $query = $request->input('search');
        $today = now()->day;

        $salesQuery = Sale::select([
                'menu.naam',
                DB::raw("CONCAT(COALESCE(menu.menunummer, ''), ' ', COALESCE(menu.menu_toevoeging, '')) as nummer"),
                'menu.price',
                'sales.amount',
                'sales.saleDate'
            ])
            ->leftJoin('menu', 'sales.itemId', '=', 'menu.id')
            ->whereDay('sales.saleDate', $today)
            ->orderBy('sales.saleDate', 'desc');

        if ($query) {
            $salesQuery->where(function($q) use ($query) {
                $q->where('menu.naam', 'like', "%{$query}%")
                ->orWhere(DB::raw("CONCAT(COALESCE(menu.menunummer, ''), ' ', COALESCE(menu.menu_toevoeging, ''))"), 'like', "%{$query}%");

                if (is_numeric($query) && strlen($query) == 4) {
                    $q->orWhereYear('sales.saleDate', $query);
                }
            });
        }

        $sales = $salesQuery->paginate(10);

        return view('admin.download.index', ['sales' => $sales]);
    }



    public function export()
    {
        $filename = "sales.xlsx";
        return Excel::download(new SalesExport, $filename);
    }
}
