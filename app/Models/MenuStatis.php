<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuStatis extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function submenus()
    {
        return $this->belongsTo(SubMenu::class);
    }
}
