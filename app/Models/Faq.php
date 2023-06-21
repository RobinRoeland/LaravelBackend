<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    // $fillable bevat de members (kolommen) die via de create method doorgegeven kunnen worden
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'categorie',
        'vraag',
        'antwoord',
    ];
}
