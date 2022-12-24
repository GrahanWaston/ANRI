<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HumanResource extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
