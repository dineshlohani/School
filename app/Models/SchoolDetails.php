<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolDetails extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'school_type',
        'school_address',
        'school_commence_date',
        'school_name',
    ];


    public function school()
    {
        return $this->belongsTo(SchoolType::class,'school_type');
    }
}
