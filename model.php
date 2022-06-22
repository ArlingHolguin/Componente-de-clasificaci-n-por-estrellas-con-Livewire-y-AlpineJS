

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeloPrueba extends Model
{
    use HasFactory;

    // Relacion al modelo que quiere calificar 
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }
}
