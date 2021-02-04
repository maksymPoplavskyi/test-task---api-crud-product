<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCharacteristics extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'product_characteristics';

    protected $fillable = [
      'product_id', 'characteristic_id', 'value'
    ];

    public $timestamps = false;
}
