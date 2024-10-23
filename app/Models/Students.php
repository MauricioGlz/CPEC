<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    /** @use HasFactory<\Database\Factories\StudenFactory> */
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'first_name',
        'father_surname',
        'mother_surname',
        'birthday',
        'parents_id'
    ];

    public function parents() {
        return $this->belongsTo(Parents::class);
    }

}
