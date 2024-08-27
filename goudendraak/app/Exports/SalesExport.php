<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Exception;

class SalesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        try {
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
        } catch (Exception $e) {
            \Log::error('Fout in de collection-functie van SalesExport: ' . $e->getMessage());
            return collect();
        }
    }

    public function headings(): array
    {
        try {
            return [
                'item naam',
                'nummer',
                'prijs',
                'hoeveelheid',
                'datum',
            ];
        } catch (Exception $e) {
            \Log::error('Fout in de headings-functie van SalesExport: ' . $e->getMessage());
            return [];
        }
    }
}