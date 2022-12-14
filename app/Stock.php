<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'nopo',  'tanggalpo','nomorbarang', 'namabarang', 'kuantitas', 'supplier'
    ];
}
