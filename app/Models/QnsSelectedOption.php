<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QnsSelectedOption extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function response()
    {
        return $this->belongsTo(QnsResponse::class, 'response_id');
    }

    public function option()
    {
        return $this->belongsTo(QnsOption::class, 'option_id');
    }
}
