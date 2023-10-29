<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function target()
    {
        return $this->hasMany(Target::class, 'id_outlet', 'id_outlet');
    }

    public function result()
    {
        return $this->hasMany(Result::class, 'id_outlet', 'id_outlet');
    }
    public function fm()
    {
        return $this->hasMany(FM::class, 'id_outlet', 'id_outlet');
    }
}
