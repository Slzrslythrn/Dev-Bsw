<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuLayanan extends Model
{
    use HasFactory;

    protected $fillable = ['layanan_id', 'nama', 'link_sso', 'link_website', 'icon', 'status', 'visit'];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'id');
    }
}
