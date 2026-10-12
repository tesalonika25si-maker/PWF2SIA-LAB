<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Menentukan nama tabel kustom di database
    protected $table = 'pelanggan';

    // Menentukan primary key kustom di database
    protected $primaryKey = 'pelanggan_id';

    // Atribut yang dapat diisi secara massal (Mass Assignment)
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'email',
        'phone',
    ];
}
