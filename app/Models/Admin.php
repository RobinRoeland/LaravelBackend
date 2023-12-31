<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // $fillable bevat de members (kolommen) die via de create method doorgegeven kunnen worden
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
    ];

    public static function addUser($id)
    {
        if (Admin::where('user_id', '=', $id)->exists() == false) {
            Admin::create([
                'user_id' => $id,
            ]);
        }
    }

    public static function removeUser($id)
    {
        Admin::where('user_id', $id)->delete();
    }
}
