<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Voter extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'voter';

    protected $fillable = [
        'id',
        'user_id',
        'candidate_ID',
    ];
}