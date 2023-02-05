<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = array('kode_baju', 'deskripsi', 'jenis', 'harga', 'kode_celana');

    public $timestamps = true;
}
