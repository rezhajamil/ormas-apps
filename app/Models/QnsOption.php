<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QnsOption extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo(QnsQuestion::class, 'question_id');
    }

    public function correct_option()
    {
        return $this->belongsTo(QnsQuestion::class, 'id', 'correct_option');
    }

    public function selected_option()
    {
        return $this->hasMany(QnsSelectedOption::class, 'option_id', 'id');
    }
}
