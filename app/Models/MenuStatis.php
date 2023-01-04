<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuStatis extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function submenu()
    {
        return $this->hasMany(SubMenu::class, 'menu_id');
    }

    public function hyperlink()
    {
        return $this->hasMany(SubMenuHyperlink::class, 'menu_id');
    }
}
