<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProposeActivity;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_name',
        'name',
        'startdate',
        'enddate',
        'time',
        'venue',
        'description',
        'objective'
    ];

    public function propose(){
        return $this->hasOne(ProposeActivity::class);
    }
}
