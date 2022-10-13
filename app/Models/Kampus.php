<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampus extends Model
{
    use HasFactory;

    protected $table = 'campus';
    protected $fillable = [
        'nama',
        'jenis',
        'status',
        'akreditasi',
        'nomor_telp',
        'fax',
        'followed'
    ];

    protected $hidden = [];
}
