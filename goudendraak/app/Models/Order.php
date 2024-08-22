<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_id',
        'menu_id',
        'time',        
        'reservation_id',
        'comment',
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

}
