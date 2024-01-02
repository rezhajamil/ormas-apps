<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QnsResponse extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function qns()
    {
        return $this->belongsTo(Qns::class, 'qns_id');
    }

    public function responder()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function outlet()
    {
        return $this->hasOne(Outlet::class, 'id_outlet', 'id_digipos');
    }

    public function selected_option()
    {
        return $this->hasMany(QnsSelectedOption::class, 'response_id', 'id');
    }
}
