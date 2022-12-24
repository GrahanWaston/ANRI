<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function Program()
    {
        return $this->hasMany(Program::class);
    }
}
