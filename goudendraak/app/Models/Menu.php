<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'menunummer',
        'menu_toevoeging',
        'naam',
        'price',
        'soortgerecht',
        'beschrijving'
    ];

    public function order()
    {
        return $this->hasOne(Order::class, 'menu_id');
    }


}
