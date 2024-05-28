<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_layanan'];

    public function menuLayanan()
    {
        return $this->hasMany(MenuLayanan::class, 'layanan_id', 'id');
    }
}
