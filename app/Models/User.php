<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
   protected $fillable = [
        
        'email','firstname','lastname','username','picture','is_online',
        "gender","phone","city","country","address","occupation",
       
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
     public function projects(){
        return $this->hasMany(Project::class);
    }
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function appliedProjects()
{
    return $this->belongsToMany(Project::class, 'applies')
                ->withTimestamps();
}
public function messagesSent()
{
    return $this->hasMany(Message::class, 'sender_id');
}

public function messagesReceived()
{
    return $this->hasMany(Message::class, 'receiver_id');
}
public function getCreatedTimeAttribute()
{
    return $this->created_at->format('H \h i \m\i\n');
}
public function applications() {
    return $this->hasMany(Application::class, 'investor_id');
}
public function hasRole($role)
{
    return $this->roles->pluck('name')->contains($role);
}

// Check multiple roles
public function hasAnyRole(array $roles)
{
    return $this->roles->pluck('name')->intersect($roles)->isNotEmpty();
}
}
