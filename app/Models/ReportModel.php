<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProposeReport;


class ReportModel extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $primarykey = 'id';
    protected $fillable=[
        'ReportCreator_name',
        'Report_Title',
        'Report_date',
        'statusbyHOSD',
        'statusbyCoordinator',
        'statusbyDean',
        'Report_description',
        'Report_objective'
    ];

    public function propose(){
        return $this->hasOne(ProposeReport::class);
    }
}
