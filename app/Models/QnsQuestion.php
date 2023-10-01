<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QnsQuestion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function qns()
    {
        return $this->belongsTo(Qns::class, 'qns_id');
    }

    public function option()
    {
        return $this->hasMany(QnsOption::class, 'question_id');
    }

    public function selected_option()
    {
        return $this->hasMany(QnsSelectedOption::class, 'question_id');
    }

    public function correct_option()
    {
        return $this->hasOne(QnsOption::class, 'correct_option', 'id');
    }
}
