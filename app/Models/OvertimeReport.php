<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OvertimeReport extends Model
{
    protected $fillable = ['overtime_id', 'total_hours'];

    public function overtime()
    {
        return $this->belongsTo(Overtime::class);
    }
}
