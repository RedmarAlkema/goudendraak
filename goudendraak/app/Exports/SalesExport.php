<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class SalesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $today = now()->day;

        $sales = Sale::select([
            'menu.naam',
            DB::raw("CONCAT(COALESCE(menu.menunummer, ''), ' ', COALESCE(menu.menu_toevoeging, '')) as nummer"),
            'menu.price',
            'sales.amount',
            'sales.saleDate'
        ])
        ->leftJoin('menu', 'sales.itemId', '=', 'menu.id')
        ->whereDay('sales.saleDate', $today)
        ->orderBy('sales.saleDate', 'desc')
        ->get();

        return $sales;
    }

    public function headings(): array{
        
        return[
            'item naam',
            'nummer',
            'prijs',
            'hoeveelheid',
            'datum',
        ];
    }
}
