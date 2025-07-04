<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Parents;

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
        'scholar_level',
        'scholar_grade',
        'grade',
        'disability',
        'disability_type',
        'religion_prep',
        'prev_catechisms_grade',
        'observations',
        'birth_cert',
        'bautizm_cert',
        'simple_bautizm_cert',
        'prev_course_cert',
        'confirmation_cert',
        'communion_cert',
        'parents_id',
    ];

    public function parents() {
        return $this->belongsTo(Parents::class);
    }

    public function store() {
        /* dd(request()->all()); */

        $parent = Parents::create([
            'father_name' => request('father_name'),
            'f_phone_number' => request('f_phone_number'),
            'f_ocupation' => request('f_ocupation'),
            'mother_name' => request('mother_name'),
            'm_phone_number' => request('m_phone_number'),
            'm_ocupation' => request('m_ocupation'),
            'relationship_status' => request('relationship_status'),
        ]);
        
        Students::create([
            'first_name' => request('first_name'),
            'father_surname' => request('father_surname'),
            'mother_surname' => request('mother_surname'),
            'birthday' => request('birthday'),
            'scholar_level' => request('level'),
            'scholar_grade' => request('grade'),
            'disability' => filter_var(request('disability'), FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'disability_type' => request('disability_type'),
            'religion_prep' => request('religious-prep'),
            'prev_catechisms_grade' => request('prev_catechisms_grade'),
            'observations' => request('observations'),
            'birth_cert' => filter_var(request('birth_cert'), FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'bautizm_cert' => filter_var(request('bautizm_cert'), FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'simple_bautizm_cert' => filter_var(request('simple_bautizm_cert'), FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'prev_course_cert' => filter_var(request('prev_course_cert'), FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'confirmation_cert' => filter_var(request('confirmation_cert'), FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'communion_cert' => filter_var(request('communion_cert'), FILTER_VALIDATE_BOOLEAN) ? 1 : 0,
            'parents_id' => $parent->id, 
        ]);

        
        
        return redirect()->back()->with('success', 'Estudiante agregado');
    }
}
