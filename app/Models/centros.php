<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centros extends Model
{
    /** @use HasFactory<\Database\Factories\CentrosFactory> */
    use HasFactory;

    public function citas(){
        return $this->belongsTo(cita::class);
    }
}
