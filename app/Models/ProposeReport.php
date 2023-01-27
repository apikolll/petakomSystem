<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReportModel;

class ProposeReport extends Model
{
    use HasFactory;

    public function Report(){
        return $this->belongsTo(ReportModel::class, 'reports_id');
    }
}
