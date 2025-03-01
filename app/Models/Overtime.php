<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    protected $fillable = ['employee_id', 'manager_id', 'date', 'start_time', 'end_time', 'hours', 'status'];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function report()
    {
        return $this->hasOne(OvertimeReport::class);
    }
}
