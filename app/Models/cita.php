<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cita extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function centro(){
        return $this->hasMany(centros::class);
    }
    protected $fillable = [
        'centros_id',
        'dia',
        'hora',
        'estado',
        'user_id'
    ];
}
