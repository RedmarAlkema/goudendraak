<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = [
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 3, 'occupied' => false, 'space' => 4, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 4, 'occupied' => false, 'space' => 6, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 5, 'occupied' => false, 'space' => 5, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 6, 'occupied' => false, 'space' => 4, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 7, 'occupied' => false, 'space' => 8, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 8, 'occupied' => false, 'space' => 2, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 9, 'occupied' => false, 'space' => 4, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 10, 'occupied' => false, 'space' => 6, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 11, 'occupied' => false, 'space' => 3, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 12, 'occupied' => false, 'space' => 4, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 13, 'occupied' => false, 'space' => 2, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 14, 'occupied' => false, 'space' => 8, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 15, 'occupied' => false, 'space' => 5, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 16, 'occupied' => false, 'space' => 6, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 17, 'occupied' => false, 'space' => 4, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 18, 'occupied' => false, 'space' => 2, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 19, 'occupied' => false, 'space' => 7, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 20, 'occupied' => false, 'space' => 5, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 21, 'occupied' => false, 'space' => 3, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 22, 'occupied' => false, 'space' => 6, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 23, 'occupied' => false, 'space' => 4, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 24, 'occupied' => false, 'space' => 2, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 25, 'occupied' => false, 'space' => 8, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 26, 'occupied' => false, 'space' => 7, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 27, 'occupied' => false, 'space' => 3, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 28, 'occupied' => false, 'space' => 4, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 29, 'occupied' => false, 'space' => 2, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 30, 'occupied' => false, 'space' => 5, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 31, 'occupied' => false, 'space' => 6, 'round' => 1, 'deluxe_menu' => false],
            ['total' => 0, 'customer_amount' => 0, 'table_number' => 32, 'occupied' => false, 'space' => 4, 'round' => 1, 'deluxe_menu' => false],
        ];

        foreach ($tables as $table) {
            Table::create($table);
        }
    }
}
