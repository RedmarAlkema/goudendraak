<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';

    public $timestamps = false;

    protected $fillable = [
        'itemId',
        'amount',
        'saleDate',
    ];
}
