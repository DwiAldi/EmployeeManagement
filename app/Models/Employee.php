<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_employee';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id_employee',
        'name',
        'address',
        'birth_date',
        'join_date'
    ];

    protected $hidden = [

    ];

    public function leaves(){
        return $this->hasMany(Leave::class, 'id_employee', 'id_employee');
    }

}
