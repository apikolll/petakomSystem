<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProposalModel extends Model
{
    use HasFactory;
    protected $table = 'proposals';
    protected $primarykey = 'id';
    protected $fillable = [
        'ProposalCreator_name',
        'Proposal_Title',
        'Proposal_date',
        'statusbyHOSD',
        'statusbyCoordinator',
        'statusbyDean',
        'Proposal_description',
        'Proposal_objective'
    ];

}
