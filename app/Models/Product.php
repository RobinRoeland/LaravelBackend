<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Get the user who added and owns the product.
     */
    public function user()
    {
        // In de background gaat Laravel hierdoor automatisch de relatie maken
        // tussen kolom "user_id" in de products tabel en "id" in de users tabel
        // Eloquent bepaalt de externe key-naam voor deze belongsTo relatie door
        // de functie-naam te nemen en er "_id" aan toe te voegen
        return $this->belongsTo(User::class);
    }
}
