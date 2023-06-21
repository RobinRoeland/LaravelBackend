<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Add a mutator to ensure hashed passwords
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    /**
     * Get the products associated with the user.
     */
    public function products()
    {
        // In de background gaat Laravel hierdoor automatisch de relatie maken
        // tussen "id" in de users tabel en "user_id" in de products tabel
        // Eloquent bepaalt de externe key-naam voor deze hasMany relatie door
        // de snake-case (=lowercase met underscores) van de parent Model (User)
        // te nemen en er _id aan toe te voegen
        return $this->hasMany(Product::class);
    }

    public function isAdmin()
    {
        if (Admin::where('user_id', '=', $this->id)->exists()) {
            return true;
        }
        return false;
    }
}
