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
        return $this->hasOne(User::class, 'id_digipos', 'id_digipos');
    }
}
