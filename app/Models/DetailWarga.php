<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailWarga extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_warga',
        'kolom',
        'label',
        'value',
    ];
}
