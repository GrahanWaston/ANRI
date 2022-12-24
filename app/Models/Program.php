<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }
}
