<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $table = 'log_summary';
    protected $fillable = ['path', 'status_code', 'time','cnt','summary_date']; #←fillableで宣言

}


