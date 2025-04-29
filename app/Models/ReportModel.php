<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class ReportModel extends Model
{
    protected $table = 'reports';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'type',
        'clientname',
        'clientaddress',
        'jobname',
        'jobno',
        'reportno',
        'date_of_rt',
        'description',
        'status',
        'reported_by',
    ];
}
