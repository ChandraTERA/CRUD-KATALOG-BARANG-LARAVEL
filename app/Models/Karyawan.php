<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $fillable = ['id', 'nama_produk', 'berat', 'harga', 'keterangan', 'created_at', 'update_at'];
    public $timestamp = true;
    
}

