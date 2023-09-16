<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donneur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'contact',
        'adresse',
        'groupe_sanguin',
        'rhesus',
        'rdv',
        'date_rdv_id'
    ];
    public function daterdv(){
        return $this->belongsTo(DateRdv::class);
    }
}
