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
        'mother_name'
    ];

    public function children() {
        return $this->belongsTo(Students::class);
    }
}
