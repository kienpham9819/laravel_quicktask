<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Department;
use Carbon\Carbon;

class Staff extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'birthday',
    ];

    protected $fillable = [
        'fullname',
        'gender',
        'address',
        'birthday',
        'avatar',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function getBirthdayAttribute($birthday)
    {
	      return Carbon::parse($birthday)->format(config('datetime.date'));
    }
}
