<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    /** @use HasFactory<\Database\Factories\ParentsFactory> */
    use HasFactory;

    protected $table = 'parents';
    protected $fillable = [
        'father_name',
        'mother_name',
        'f_phone_number',
        'm_phone_number',
        'f_occupation',
        'm_occupation',
        'relationship_status',
    ];

    public function children() {
        return $this->hasMany(Students::class);
    }
}
