<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qns extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getAll()
    {
        $data = Qns::with(['creator', 'question', 'response'])->orderBy('created_at', 'DESC')->get();

        return $data;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->hasMany(QnsQuestion::class, 'qns_id');
    }

    public function response()
    {
        return $this->hasMany(QnsResponse::class, 'qns_id');
    }
}
