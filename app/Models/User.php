<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'birthday',
        'active',
        'phone_number',
        'role_code',
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

    public function address(){
        return $this->hasOne(Address::class);
    }

    public function role(){
        return $this->hasOne(Role::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function getSubscriptionById($id)
    {
        return $this->subscriptions()->where('id', $id)->first();
    }

    public function wallets()
    {
        return $this->belongsToMany(Wallet::class, 'user_wallet', 'user_id', 'wallet_id');
    }

    public function getWalletById($id)
    {
        return $this->wallets()->where('wallet_id', $id)->first();
    }

    public function events(){
        return $this->hasMany(Event::class);
    }

    public function plans(){
        return $this->hasMany(Plan::class);
    }
}
