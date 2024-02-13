<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Atasa;

class Kategoria extends Model
{


    use HasFactory;

  
    public function atasak(){
        return $this->hasMany(Atasa::class);
    }
}

