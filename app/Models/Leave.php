<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leave extends Model
{
    use HasFactory, SoftDeletes;

    // protected $primaryKey = 'id_employee';

    // public $incrementing = false;

    // protected $keyType = 'string';

    protected $fillable = [
        'id_employee',
        'leave_date',
        'leave_period',
        'reason',
        'status'
    ];

    protected $hidden = [

    ];

    public function employee(){
        return $this->belongsTo(Employee::class, 'id_employee', 'id_employee');
    }
}
