<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Token;
use App\Models\Log;
use App\Models\Menu;
use App\Models\Time;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function token() {
        return $this->hasOne(Token::class);
    }

    public function logs() {
        return $this->hasMany(Log::class);
    }

    public function menus() {
        return $this->hasMany(Menu::class);
    }

    public function time() {
        return $this->hasOne(Time::class);
    }
}
