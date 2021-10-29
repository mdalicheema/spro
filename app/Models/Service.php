<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'short_info',
        'dribbble',
        'dribbble_des',
        'file',
        'file_des',
        'tachometer',
        'tachometer_des',
        'layer',
        'layer_des',
        'slideshow',
        'slideshow_des',
        'arch',
        'arch_des',
    ];
}
