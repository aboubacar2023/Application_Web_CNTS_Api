<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateRdv extends Model
{
    use HasFactory;
    public function donneur(){
        return $this->hasMany(Donneur::class, 'date_rdv_id');
    }
    protected $casts = [
        'daterdv' => 'date',
    ];
}
