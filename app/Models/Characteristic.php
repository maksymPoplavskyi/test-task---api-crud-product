<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'characteristics';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
