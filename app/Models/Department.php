<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Staff;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
    	'name'
    ];

    public function staffs()
    {
    	return $this->hasMany(Staff::class);
    }
    
}
